<?php

namespace App\Model\Request\AgeModifier;

use App\Trait\ModifierTrait;

class CreateAgeModifierRequest
{
    use ModifierTrait;
    private int $lowerAgeLimit;
    private int $upperAgeLimit;

    public function setLowerAgeLimit(int $lowerAgeLimit): CreateAgeModifierRequest
    {
        $this->lowerAgeLimit = $lowerAgeLimit;
        return $this;
    }

    public function setUpperAgeLimit(int $upperAgeLimit): CreateAgeModifierRequest
    {
        $this->upperAgeLimit = $upperAgeLimit;
        return $this;
    }

    public function getLowerAgeLimit(): int
    {
        return $this->lowerAgeLimit;
    }

    public function getUpperAgeLimit(): int
    {
        return $this->upperAgeLimit;
    }
}