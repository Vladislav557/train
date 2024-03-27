<?php

namespace App\Trait;

trait ModifierTrait
{
    private int $discountPercent;
    private ?int $absoluteDiscountLimit = null;

    public function getDiscountPercent(): int
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(int $discountPercent): self
    {
        $this->discountPercent = $discountPercent;
        return $this;
    }

    public function getAbsoluteDiscountLimit(): ?int
    {
        return $this->absoluteDiscountLimit;
    }

    public function setAbsoluteDiscountLimit(?int $absoluteDiscountLimit): self
    {
        $this->absoluteDiscountLimit = $absoluteDiscountLimit;
        return $this;
    }
}