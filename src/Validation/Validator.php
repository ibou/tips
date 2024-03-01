<?php

declare(strict_types=1);

namespace App\Validation;

use App\Validation\Rules\ValidationRuleInterface;
use ReflectionClass;

class Validator
{

    private array $errors = [];


    public function validate(object $object): void
    {
        $reflector = new ReflectionClass($object);

        foreach ($reflector->getProperties() as $property) {
            $attributes = $property->getAttributes(
                ValidationRuleInterface::class,
                \ReflectionAttribute::IS_INSTANCEOF
            );
            foreach ($attributes as $attribute) {
                $validator = $attribute->newInstance()->getValidator();
                if (!$validator->validate($property->getValue($object))) {
                    $this->errors[$property->getName()][] = sprintf(
                        'Invalid value for %s using %s validation',
                        $property->getName(),
                        $attribute->getName(),

                    );
                }

            }
        }

    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function printErrors(): void
    {
        foreach ($this->errors as $property => $error) {
            foreach ($error as $message) {
                dump( sprintf('%s: %s', $property, $message) );
            }
        }
    }

}