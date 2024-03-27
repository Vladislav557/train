<?php

namespace App\Controller;

use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/travel/api1')]
#[OA\Tag(name: 'Health Check Controller')]
class HealthCheckController extends AbstractController
{
    #[OA\Get(summary: 'Статус работы сервиса')]
    #[OA\Response(
        response: Response::HTTP_OK,
        description: 'Success',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'status',
                    type: 'string'
                )
            ]
        )
    )]
    #[Route(path: '/health', name: 'app_health_check', methods: ['GET'])]
    public function health(): Response
    {
        return $this->json(['status' => 'ok'], Response::HTTP_OK);
    }
}
