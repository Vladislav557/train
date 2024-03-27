<?php

namespace App\Entity;

use App\Repository\AgeModifierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgeModifierRepository::class)]
class AgeModifier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $discountPercent = null;

    #[ORM\Column(nullable: true)]
    private ?int $discountAbsoluteLimit = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $lowerAgeLimit = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $upperAgeLimit = null;

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

    public function setDiscountAbsoluteLimit(int $discountAbsoluteLimit): static
    {
        $this->discountAbsoluteLimit = $discountAbsoluteLimit;

        return $this;
    }

    public function getLowerAgeLimit(): ?int
    {
        return $this->lowerAgeLimit;
    }

    public function setLowerAgeLimit(int $lowerAgeLimit): static
    {
        $this->lowerAgeLimit = $lowerAgeLimit;

        return $this;
    }

    public function getUpperAgeLimit(): ?int
    {
        return $this->upperAgeLimit;
    }

    public function setUpperAgeLimit(int $upperAgeLimit): static
    {
        $this->upperAgeLimit = $upperAgeLimit;

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
