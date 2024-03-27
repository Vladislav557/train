<?php

namespace App\Service;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Exception;

class HelperService
{
    /**
     * @throws Exception
     */
    public static function checkErrors(ConstraintViolationListInterface $violations): void
    {
        if ($violations->count()) {
            foreach ($violations as $violation) {
                throw new Exception($violation->getMessage());
            }
        }
    }
}