<?php

namespace App\Controller;

use App\Interface\CalculationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Attributes as OA;
use Psr\Log\LoggerInterface;

class CalculationController extends AbstractController
{
    public function __construct(
        private readonly CalculationInterface $calculation,
        private readonly ValidatorInterface $validator,
        private readonly SerializerInterface $serializer,
        private readonly LoggerInterface $logger
    )
    {
    }

    #[Route('/calculation', name: 'app_calculation', methods: ['POST'])]
    public function calc(): Response
    {
        return $this->render('calculation/index.html.twig', [
            'controller_name' => 'CalculationController',
        ]);
    }
}
