<?php

namespace App\Model\Request;

use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;

class CalculateRequest
{
    #[Assert\NotBlank]
    #[Assert\Type(Types::STRING)]
    private float $baseCost;

    #[Assert\NotBlank]
    #[Assert\Type(Types::DATE_MUTABLE)]
    private DateTime $birthDate;

    #[Assert\Type(Types::DATE_MUTABLE)]
    private ?DateTime $startDate;

    #[Assert\Type(Types::DATE_MUTABLE)]
    private ?DateTime $payDay;

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