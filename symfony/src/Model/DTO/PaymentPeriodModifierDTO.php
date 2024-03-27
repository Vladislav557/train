<?php

namespace App\Model\DTO;

use App\Trait\ModifierTrait;
use DateTime;

class PaymentPeriodModifierDTO
{
    use ModifierTrait;
    private int $id;
    private DateTime $bookingStart;
    private ?DateTime $bookingEnd;
    private DateTime $paymentDateBorder;
    private DateTime $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): PaymentPeriodModifierDTO
    {
        $this->id = $id;
        return $this;
    }

    public function getBookingStart(): DateTime
    {
        return $this->bookingStart;
    }

    public function setBookingStart(DateTime $bookingStart): PaymentPeriodModifierDTO
    {
        $this->bookingStart = $bookingStart;
        return $this;
    }

    public function getBookingEnd(): ?DateTime
    {
        return $this->bookingEnd;
    }

    public function setBookingEnd(?DateTime $bookingEnd): PaymentPeriodModifierDTO
    {
        $this->bookingEnd = $bookingEnd;
        return $this;
    }

    public function getPaymentDateBorder(): DateTime
    {
        return $this->paymentDateBorder;
    }

    public function setPaymentDateBorder(DateTime $paymentDateBorder): PaymentPeriodModifierDTO
    {
        $this->paymentDateBorder = $paymentDateBorder;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): PaymentPeriodModifierDTO
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}