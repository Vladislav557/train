<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HealthCheckControllerTest extends WebTestCase
{
    public function testHealthCheck(): void
    {
        $client = static::createClient([
            'environment' => 'test',
            'debug' => false,
        ]);
        $client->request('GET', '/travel/api1/health');
        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), 1);
        $this->assertEquals(['status' => 'ok'], $response);
    }
}
