<?php

namespace App\Model\DTO;


use App\Trait\ModifierTrait;
use DateTime;

class AgeModifierDTO
{
    use ModifierTrait;
    private int $id;
    private int $lowerAgeLimit;
    private int $upperAgeLimit;
    private DateTime $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): AgeModifierDTO
    {
        $this->id = $id;
        return $this;
    }

    public function getLowerAgeLimit(): int
    {
        return $this->lowerAgeLimit;
    }

    public function setLowerAgeLimit(int $lowerAgeLimit): AgeModifierDTO
    {
        $this->lowerAgeLimit = $lowerAgeLimit;
        return $this;
    }

    public function getUpperAgeLimit(): int
    {
        return $this->upperAgeLimit;
    }

    public function setUpperAgeLimit(int $upperAgeLimit): AgeModifierDTO
    {
        $this->upperAgeLimit = $upperAgeLimit;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): AgeModifierDTO
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}