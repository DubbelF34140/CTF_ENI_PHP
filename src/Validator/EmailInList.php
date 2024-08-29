<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class EmailInList extends Constraint
{
    public string $message = 'L\'email doit être votre adresse @campus-eni.fr.';

    public function validatedBy(): string
    {
        return static::class.'Validator';
    }
}
