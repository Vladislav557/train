<?php

namespace App\Interface;

use App\Model\Request\CalculateRequest;

interface CalculationInterface
{
    public function calculate(CalculateRequest $request): float;
}