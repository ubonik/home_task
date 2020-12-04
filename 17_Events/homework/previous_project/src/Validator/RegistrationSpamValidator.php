<?php

namespace App\Validator;

use App\Homework\RegistrationSpamFilter;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class RegistrationSpamValidator extends ConstraintValidator
{
    /**
     * @var RegistrationSpamFilter
     */
    private $registrationSpamFilter;

    public function __construct(RegistrationSpamFilter $registrationSpamFilter)
    {
        $this->registrationSpamFilter = $registrationSpamFilter;
    }

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\RegistrationSpam */

        if (null === $value || '' === $value) {
            return;
        }

        if (! $this->registrationSpamFilter->filter($value)) {
            return;
        }

        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}
