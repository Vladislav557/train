<?php

namespace App\Entity;

use App\Repository\PaymentPeriodModifierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentPeriodModifierRepository::class)]
class PaymentPeriodModifier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $discountPercent = null;

    #[ORM\Column(nullable: true)]
    private ?int $discountAbsoluteLimit = null;

    #[ORM\Column]
    private ?int $bookingStart = null;

    #[ORM\Column(nullable: true)]
    private ?int $bookingEnd = null;

    #[ORM\Column]
    private ?int $paymentDateBorder = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscountPercent(): ?int
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(int $discountPercent): static
    {
        $this->discountPercent = $discountPercent;

        return $this;
    }

    public function getDiscountAbsoluteLimit(): ?int
    {
        return $this->discountAbsoluteLimit;
    }

    public function setDiscountAbsoluteLimit(?int $discountAbsoluteLimit): static
    {
        $this->discountAbsoluteLimit = $discountAbsoluteLimit;

        return $this;
    }

    public function getBookingStart(): ?int
    {
        return $this->bookingStart;
    }

    public function setBookingStart(int $bookingStart): static
    {
        $this->bookingStart = $bookingStart;

        return $this;
    }

    public function getBookingEnd(): ?int
    {
        return $this->bookingEnd;
    }

    public function setBookingEnd(?int $bookingEnd): static
    {
        $this->bookingEnd = $bookingEnd;

        return $this;
    }

    public function getPaymentDateBorder(): ?int
    {
        return $this->paymentDateBorder;
    }

    public function setPaymentDateBorder(int $paymentDateBorder): static
    {
        $this->paymentDateBorder = $paymentDateBorder;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
