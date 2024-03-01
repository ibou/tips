<?php

use App\DTO\UserRegistration;
use App\Validation\Validator;

require_once  __DIR__ . '/vendor/autoload.php';

$userRegistration = new UserRegistration(username: 'rarar', email: 'smaigmail.com');

$validator = new Validator();

$validator->validate($userRegistration);

$errors = $validator->getErrors();

if($validator->hasErrors()) {
    $validator->printErrors();
}
