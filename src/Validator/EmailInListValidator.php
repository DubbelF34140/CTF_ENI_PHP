<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class EmailInListValidator extends ConstraintValidator
{
    private array $allowedEmails = [
        'test@test.com',
        'test2@test.com',
        'test3@test.com'
    ];

    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof EmailInList) {
            throw new UnexpectedTypeException($constraint, EmailInList::class);
        }

        if ($value === null) {
            return; // Pas besoin de valider si le champ est vide, laissez d'autres contraintes gérer cela.
        }

        if (!in_array($value, $this->allowedEmails, true)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
