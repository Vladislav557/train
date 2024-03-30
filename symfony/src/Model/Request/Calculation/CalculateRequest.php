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

    /**
     * @param float $baseCost
     * @param DateTime $birthDate
     * @param DateTime|null $startDate
     * @param DateTime|null $payDay
     */
    public function __construct(float $baseCost, DateTime $birthDate, ?DateTime $startDate = null, ?DateTime $payDay = null)
    {
        $this->baseCost = $baseCost;
        $this->birthDate = $birthDate;
        $this->startDate = $startDate;
        $this->payDay = $payDay;
    }

    public function getBaseCost(): float
    {
        return $this->baseCost;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    public function getPayDay(): ?DateTime
    {
        return $this->payDay;
    }
}