<?php

declare(strict_types=1);

namespace App\DTO;

use App\Validation\Rules\Email;
use App\Validation\Rules\Required;

readonly class UserRegistration
{

    public function __construct(

    #[Required]
         public string $username,
    #[Required]
    #[Email]
         public string $email,
    ) {
    }
}