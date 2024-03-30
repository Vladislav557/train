<?php

namespace App\Service;

use App\Entity\AgeModifier;
use App\Entity\PaymentPeriodModifier;
use App\Interface\CalculationInterface;
use App\Interface\ModifierInterface;
use App\Model\Request\Calculation\CalculateRequest;
use App\Model\Response\Calculation\CalculateResponse;
use App\Repository\AgeModifierRepository;
use App\Repository\PaymentPeriodModifierRepository;
use DateTime;

readonly class CalculationService implements CalculationInterface
{
    public function __construct(
        private AgeModifierRepository $ageModifierRepository,
        private PaymentPeriodModifierRepository $paymentPeriodModifierRepository
    )
    {
    }

    public function calculate(CalculateRequest $request): CalculateResponse
    {
        return new CalculateResponse($this->applyModifiers($request));
    }

    public function applyModifiers(CalculateRequest $request): float
    {
        $cost = $request->getBaseCost();
        $modifiers = $this->getMatchedModifiers($request);
        foreach ($modifiers as $modifier) {
            $cost = self::applyModifier($modifier, $cost);
        }
        return $cost;
    }

    public static function applyModifier(?ModifierInterface $modifier, float $currentCost): float
    {
        if (is_null($modifier)) {
            return $currentCost;
        }
        $absoluteDiscount = $modifier->getDiscountPercent() / 100 * $currentCost;
        if ($modifier->getDiscountAbsoluteLimit() && $absoluteDiscount > $modifier->getDiscountAbsoluteLimit()) {
            return $currentCost - $modifier->getDiscountAbsoluteLimit();
        } else {
            return $currentCost - $absoluteDiscount;
        }
    }

    public function getMatchedModifiers(CalculateRequest $request): array
    {
        $result = [];
        $result[] = self::getMatchedAgeModifier($this->ageModifierRepository->findAll(), $request);
        $result[] = self::getMatchedPaymentModifier($this->paymentPeriodModifierRepository->findAll(), $request);
        return array_values(array_filter($result));
    }

    public static function getMatchedAgeModifier(array $ageModifiers, CalculateRequest $request): ?AgeModifier
    {
        $currentDate = new DateTime();
        $age = $currentDate->diff($request->getBirthDate())->y;
        foreach ($ageModifiers as $modifier) {
            /**@var AgeModifier $modifier*/
            if ($modifier->getLowerAgeLimit() <= $age && $modifier->getUpperAgeLimit() > $age) {
                return $modifier;
            }
        }
        return null;
    }

    public static function getMatchedPaymentModifier(array $paymentModifiers, CalculateRequest $request): ?PaymentPeriodModifier
    {
        if (is_null($request->getPayDay())) {
            return null;
        }
        $paymentTimestamp = $request->getPayDay()->getTimestamp();
        $travelTimestamp = $request->getStartDate()->getTimestamp();
        foreach ($paymentModifiers as $modifier) {
            /**@var PaymentPeriodModifier $modifier*/
            if ($modifier->getBookingStart() <= $travelTimestamp && $modifier->getBookingEnd() > $travelTimestamp) {
                if ($modifier->getPaymentDateBorder() >= $paymentTimestamp) {
                    return $modifier;
                }
            }
        }
        return null;
    }
}