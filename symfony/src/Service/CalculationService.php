<?php

namespace App\Service;

use App\Interface\CalculationInterface;
use App\Interface\ModifierServiceInterface;
use App\Model\Request\Calculation\CalculateRequest;
use App\Model\Response\Calculation\CalculateResponse;

readonly class CalculationService implements CalculationInterface
{
    public function __construct(
        private ModifierServiceInterface $modifierService
    )
    {
    }

    public function calculate(CalculateRequest $request): CalculateResponse
    {
        $cost = $request->getBaseCost();
        $modifiers = $this->modifierService->getMatchedModifiers($request);
        foreach ($modifiers as $modifier) {
            $cost = ModifierService::applyModifier($modifier, $cost);
        }
        return new CalculateResponse($cost);
    }
}