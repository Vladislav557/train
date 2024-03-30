<?php

namespace App\Interface;

interface ModifierInterface
{
    public function getDiscountPercent(): ?int;
    public function getDiscountAbsoluteLimit(): ?int;
    public function getType(): string;
}