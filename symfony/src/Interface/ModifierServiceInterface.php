<?php

namespace App\Interface;

use App\Entity\AgeModifier;
use App\Entity\PaymentPeriodModifier;
use App\Model\Request\Calculation\CalculateRequest;

interface ModifierServiceInterface
{
    public static function applyModifier(?ModifierInterface $modifier, float $currentCost): float;

    public static function getMatchedAgeModifier(array $ageModifiers, CalculateRequest $request): ?AgeModifier;

    public static function getMatchedPaymentModifier(array $paymentModifiers, CalculateRequest $request): ?PaymentPeriodModifier;

    public function getMatchedModifiers(CalculateRequest $request): array;
}