<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class EmailInListValidator extends ConstraintValidator
{
    private array $allowedEmails = [
        'sebastien.bodin2022@campus-eni.fr',
        'gabin.brochard2023@campus-eni.fr',
        'ludovic.proux2023@campus-eni.fr',
        'sandie.guerin2023@campus-eni.fr',
        'lucas.soaresmoenner2023@campus-eni.fr',
        'hugo.cirette2023@campus-eni.fr',
        'nicolas.pinotcardona2023@campus-eni.fr',
        'romain.roland2023@campus-eni.fr',
        'william.lamothe2023@campus-eni.fr',
        'marion.pougnard2023@campus-eni.fr',
        'arthur.bouchaud2023@campus-eni.fr',
        'rick.bouyaghi2023@campus-eni.fr',
        'ylan.woelffle2023@campus-eni.fr',
        'mathis.deschamps2023@campus-eni.fr',
        'emmanuelle.boinot2023@campus-eni.fr',
        'julian.montagne2023@campus-eni.fr',
        'alexis.draud2023@campus-eni.fr',
        'theo.pohin2023@campus-eni.fr',
        'guillaume.tournan2023@campus-eni.fr',
        'melissa.cochet2023@campus-eni.fr',
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
