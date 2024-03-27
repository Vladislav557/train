<?php

namespace App\Interface;

use App\Model\Request\Calculation\CalculateRequest;

interface CalculationInterface
{
    public function calculate(CalculateRequest $request): float;
}