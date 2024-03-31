<?php

namespace App\Tests\Service;

use App\Interface\ModifierServiceInterface;
use App\Model\Request\Calculation\CalculateRequest;
use App\Repository\AgeModifierRepository;
use App\Repository\PaymentPeriodModifierRepository;
use App\Service\ModifierService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use DateTime;

class ModifierServiceTest extends KernelTestCase
{
    private array $testCases;
    private ModifierServiceInterface $modifierService;
    private AgeModifierRepository $ageModifierRepository;
    private PaymentPeriodModifierRepository $periodModifierRepository;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel([
            'environment' => 'test',
            'debug' => false
        ]);

        $this->modifierService = self::getContainer()->get(ModifierService::class);
        $this->ageModifierRepository = self::getContainer()->get(AgeModifierRepository::class);
        $this->periodModifierRepository = self::getContainer()->get(PaymentPeriodModifierRepository::class);

        $this->testCases = [
            [
                'data' => new CalculateRequest(
                    baseCost: 100000.0,
                    birthDate: new DateTime("2018-01-01"),
                    startDate: new DateTime("2025-04-01"),
                    payDay: new DateTime("2024-12-01")
                ),
                'expect' => 2
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2020-01-01"),
                    startDate: new DateTime("2025-01-01")
                ),
                'expect' => 1
            ],
            [
                'data' => new CalculateRequest(
                    baseCost: 10000.0,
                    birthDate: new DateTime("2000-01-01"),
                    startDate: new DateTime("2025-01-01")
                ),
                'expect' => 0
            ]
        ];
    }

    public function testGetModifierList(): void
    {
        foreach ($this->testCases as $testCase) {
            $list = $this->modifierService->getMatchedModifiers($testCase['data']);
            $this->assertCount($testCase['expect'], $list, "Length of the list should be $testCase[expect] items");
        }
    }

    public function testGetMatchedPaymentModifier(): void
    {
        $testPaymentCase1 = new CalculateRequest(
            baseCost: 10000.0,
            birthDate: new DateTime("2000-01-01"),
            startDate: new DateTime("2025-04-01"),
            payDay: new DateTime("2024-11-01")
        );
        $testPaymentCase2 = new CalculateRequest(
            baseCost: 10000.0,
            birthDate: new DateTime("2000-01-01"),
            startDate: new DateTime("2025-04-01")
        );
        $paymentModifiers = $this->periodModifierRepository->findAll();

        $this->assertNotNull(ModifierService::getMatchedPaymentModifier($paymentModifiers, $testPaymentCase1), 'Modifier shouldn`t be null');
        $this->assertNull(ModifierService::getMatchedPaymentModifier($paymentModifiers, $testPaymentCase2), 'Modifier should be null');
    }

    public function testGetMatchedAgeModifier(): void
    {
        $testAgeCase1 = new CalculateRequest(
            baseCost: 10000.0,
            birthDate: new DateTime("2020-01-01"),
            startDate: new DateTime("2025-04-01"),
            payDay: new DateTime("2024-11-01")
        );
        $testAgeCase2 = new CalculateRequest(
            baseCost: 10000.0,
            birthDate: new DateTime("2000-01-01"),
            startDate: new DateTime("2025-04-01")
        );
        $paymentModifiers = $this->periodModifierRepository->findAll();

        $this->assertNotNull(ModifierService::getMatchedPaymentModifier($paymentModifiers, $testAgeCase1), 'Modifier shouldn`t be null');
        $this->assertNull(ModifierService::getMatchedPaymentModifier($paymentModifiers, $testAgeCase2), 'Modifier should be null');
    }
}
