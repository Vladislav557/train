<?php

namespace App\Controller;

use App\Interface\CalculationInterface;
use App\Model\Request\Calculation\CalculateRequest;
use App\Model\Response\Calculation\CalculateResponse;
use App\Service\HelperService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\RequestBody;
use OpenApi\Attributes\Response as ResponseDoc;
use OpenApi\Attributes\Tag;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Throwable;

#[ResponseDoc(
    response: 400,
    description: "Bad request",
    content: new JsonContent(
        properties: [
            new Property(
                property: 'error',
                type: 'string'
            )
        ]
    )
)]
    #[Route(path: '/travel/api1/calculation')]
#[Tag(name: 'Calculation Controller')]
class CalculationController extends AbstractController
{
    public function __construct(
        private readonly CalculationInterface $calculationService,
        private readonly ValidatorInterface $validator,
        private readonly SerializerInterface $serializer,
        private readonly LoggerInterface $logger
    )
    {
    }

    #[Post(summary: 'Расчет конечной стоимости поездки')]
    #[RequestBody(
        content: new JsonContent(
            ref: new Model(
                type: CalculateRequest::class
            )
        )
    )]
    #[ResponseDoc(
        response: Response::HTTP_OK,
        description: 'success',
        content: new JsonContent(
            ref: new Model(
                type: CalculateResponse::class
            )
        )
    )]
    #[Route('/calculate', name: 'app_calculation', methods: ['POST'])]
    public function calculate(Request $request): Response
    {
        $data = [];
        $statusCode = Response::HTTP_BAD_REQUEST;
        try {
            $calculationRequest = $this
                ->serializer
                ->deserialize(
                    data: $request->getContent(),
                    type: CalculateRequest::class,
                    format: 'json'
                );
            $violations = $this->validator->validate($calculationRequest);
            HelperService::checkErrors($violations);
            $data = $this->calculationService->calculate($calculationRequest);
            $statusCode = Response::HTTP_OK;
        } catch (Throwable $throwable) {
            $this->logger->error('calculation error: ' . $throwable->getMessage());
            $data['error'] = $throwable->getMessage();
        }
        return $this->json($data, $statusCode);
    }
}
