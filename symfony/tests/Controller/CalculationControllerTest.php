<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CalculationControllerTest extends WebTestCase
{
    public function testCalculation(): void
    {
        $client = static::createClient([
            'environment' => 'test',
            'debug' => false,
        ]);
        $content = [
            'baseCost' => 10000.0,
            'birthDate' => '2009-01-01',
            'startDate' => '2025-04-01'
        ];
        $client->request(
            method: 'POST',
            uri: '/travel/api1/calculation/calculate',
            content: json_encode($content, 1)
        );
        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), 1);
        $this->assertEquals(['cost' => 9000.0], $response);;
    }

    public function testCalculationError(): void
    {
        $client = static::createClient([
            'environment' => 'test',
            'debug' => false,
        ]);
        $content = [
            'baseCost' => 10000.0,
            'startDate' => '2025-04-01'
        ];
        $client->request(
            method: 'POST',
            uri: '/travel/api1/calculation/calculate',
            content: json_encode($content, 1)
        );
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }
}
