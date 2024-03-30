<?php

namespace App\Interface;

use App\Model\Request\Calculation\CalculateRequest;
use App\Model\Response\Calculation\CalculateResponse;

interface CalculationInterface
{
    public function calculate(CalculateRequest $request): CalculateResponse;
}