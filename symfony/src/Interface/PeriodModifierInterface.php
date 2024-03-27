<?php

namespace App\Interface;

use App\Model\DTO\PaymentPeriodModifierDTO;
use App\Model\Request\PaymentPeriodModifier\CreatePaymentPeriodModifier;

interface PeriodModifierInterface
{
    public function create(CreatePaymentPeriodModifier $modifierRequest): PaymentPeriodModifierDTO;
    public function get(int $id): PaymentPeriodModifierDTO;
    public function remove(int $id): void;
    public function list(): array;
}