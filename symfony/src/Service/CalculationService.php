<?php

namespace App\Service;

use App\Interface\CalculationInterface;
use App\Model\Request\Calculation\CalculateRequest;

readonly class CalculationService implements CalculationInterface
{
    public function calculate(CalculateRequest $request): float
    {
        // TODO: Implement calculate() method.
    }
}