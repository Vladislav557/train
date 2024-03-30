<?php

namespace App\Tests\Service;

use DateTime;
use Exception;
use App\Service\CalculationService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Model\Request\Calculation\CalculateRequest;

class CalculationServiceTest extends KernelTestCase
{
    public function testCalculation(): void
    {
        self::bootKernel([
            'environment' => 'test',
            'debug' => false
        ]);
        $calculationService = self::getContainer()->get(CalculationService::class);
        $testCases = [
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2020-01-01"),
                    startDate: new DateTime("2025-01-01")
                ),
                'expect' => 2000.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2018-01-01"),
                    startDate: new DateTime("2025-01-01")
                ),
                'expect' => 7000.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 20000.0,
                    birthDate: new DateTime("2018-01-01"),
                    startDate: new DateTime("2025-01-01")
                ),
                'expect' => 15500.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2010-01-01"),
                    startDate: new DateTime("2025-01-01")
                ),
                'expect' => 9000.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2000-01-01"),
                    startDate: new DateTime("2025-04-01"),
                    payDay: new DateTime("2024-11-01")
                ),
                'expect' => 9300.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2000-01-01"),
                    startDate: new DateTime("2025-04-01"),
                    payDay: new DateTime("2024-12-01")
                ),
                'expect' => 9500.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2000-01-01"),
                    startDate: new DateTime("2025-04-01"),
                    payDay: new DateTime("2025-01-01")
                ),
                'expect' => 9700.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2000-01-01"),
                    startDate: new DateTime("2024-10-01"),
                    payDay: new DateTime("2024-03-01")
                ),
                'expect' => 9300.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2000-01-01"),
                    startDate: new DateTime("2025-01-15"),
                    payDay: new DateTime("2024-10-01")
                ),
                'expect' => 9700.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2020-01-01"),
                    startDate: new DateTime("2025-04-01"),
                    payDay: new DateTime("2024-12-01")
                ),
                'expect' => 1900.0
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 100000.0,
                    birthDate: new DateTime("2018-01-01"),
                    startDate: new DateTime("2025-04-01"),
                    payDay: new DateTime("2024-12-01")
                ),
                'expect' => 94000
            ],
        ];

        foreach ($testCases as $index => $testCase) {
            $this->assertEquals(
                expected: $testCase['expect'],
                actual: $calculationService->calculate($testCase['data'])->getCost(),
                message: "Test № $index failed"
            );
        }
    }
}
