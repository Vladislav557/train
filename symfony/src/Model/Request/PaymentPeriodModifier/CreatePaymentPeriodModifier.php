<?php

namespace App\Model\Request\PaymentPeriodModifier;

use App\Trait\ModifierTrait;

class CreatePaymentPeriodModifier
{
    use ModifierTrait;
    private int $bookingStart;
    private ?int $bookingEnd;
    private int $paymentDateBorder;

    public function setBookingStart(int $bookingStart): CreatePaymentPeriodModifier
    {
        $this->bookingStart = $bookingStart;
        return $this;
    }

    public function setBookingEnd(?int $bookingEnd): CreatePaymentPeriodModifier
    {
        $this->bookingEnd = $bookingEnd;
        return $this;
    }

    public function setPaymentDateBorder(int $paymentDateBorder): CreatePaymentPeriodModifier
    {
        $this->paymentDateBorder = $paymentDateBorder;
        return $this;
    }

    public function getBookingStart(): int
    {
        return $this->bookingStart;
    }

    public function getBookingEnd(): ?int
    {
        return $this->bookingEnd;
    }

    public function getPaymentDateBorder(): int
    {
        return $this->paymentDateBorder;
    }
}