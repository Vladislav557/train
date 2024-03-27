<?php

namespace App\Model\Response\Calculation;

use Symfony\Component\Validator\Constraints\NotBlank;

class CalculateResponse
{
    #[NotBlank]
    private float $cost;

    public function __construct(float $cost)
    {
        $this->cost = $cost;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}