<?php

declare(strict_types=1);

namespace App\Validation\Validators;

interface ValidatorInterface
{

    public function validate($value): bool;
}