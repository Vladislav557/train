<?php

namespace App\Service;

use App\Interface\PeriodModifierInterface;
use App\Model\DTO\PaymentPeriodModifierDTO;
use App\Model\Request\PaymentPeriodModifier\CreatePaymentPeriodModifier;

class PaymentPeriodModifierService implements PeriodModifierInterface
{

    public function create(CreatePaymentPeriodModifier $modifierRequest): PaymentPeriodModifierDTO
    {
        // TODO: Implement create() method.
    }

    public function get(int $id): PaymentPeriodModifierDTO
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