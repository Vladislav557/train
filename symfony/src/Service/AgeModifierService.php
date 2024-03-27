<?php

namespace App\Service;

use App\Interface\AgeModifierInterface;
use App\Model\DTO\AgeModifierDTO;
use App\Model\Request\AgeModifier\CreateAgeModifierRequest;

class AgeModifierService implements AgeModifierInterface
{

    public function create(CreateAgeModifierRequest $modifierRequest): AgeModifierDTO
    {
        // TODO: Implement create() method.
    }

    public function get(int $id): AgeModifierDTO
    {
        // TODO: Implement get() method.
    }

    public function remove(int $id): void
    {
        // TODO: Implement remove() method.
    }

    public function list(): array
    {
        // TODO: Implement list() method.
    }
}