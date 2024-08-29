<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class EmailInList extends Constraint
{
    public string $message = 'L\'email "{{ value }}" n\'est pas autorisé.';

    public function validatedBy(): string
    {
        return static::class.'Validator';
    }
}
