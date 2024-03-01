<?php

declare(strict_types=1);

namespace App\Validation\Rules;

use App\Validation\Validators\ValidatorInterface;

interface ValidationRuleInterface
{
    public function getValidator(): ValidatorInterface;

}