<?php

namespace App\Interface;

use App\Model\DTO\AgeModifierDTO;
use App\Model\Request\AgeModifier\CreateAgeModifierRequest;

interface AgeModifierInterface
{
    public function create(CreateAgeModifierRequest $modifierRequest): AgeModifierDTO;
    public function get(int $id): AgeModifierDTO;
    public function remove(int $id): void;
    public function list(): array;
}