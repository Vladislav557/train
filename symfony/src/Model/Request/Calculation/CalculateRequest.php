<?php

namespace App\Model\Request\Calculation;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

class CalculateRequest
{
    #[Assert\NotBlank]
    #[Assert\Type(Types::FLOAT)]
    private float $baseCost;

    #[Assert\NotBlank]
    private DateTime $birthDate;

    private ?DateTime $startDate = null;

    private ?DateTime $payDay = null;

    public function getBaseCost(): float
    {
        return $this->baseCost;
    }

    public function setBaseCost(float $baseCost): CalculateRequest
    {
        $this->baseCost = $baseCost;
        return $this;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate): CalculateRequest
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTime $startDate): CalculateRequest
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getPayDay(): ?DateTime
    {
        return $this->payDay;
    }

    public function setPayDay(?DateTime $payDay): CalculateRequest
    {
        $this->payDay = $payDay;
        return $this;
    }
}