<?php

namespace App\Utils\Validator\Constraint\General;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * @Annotation
 */
class PhoneNumberConstraintValidator extends ConstraintValidator
{

    public const PHONE_REGEX = '\+[1-9]\d{1,14}';

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validate
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof PhoneNumberConstraint) {
            throw new UnexpectedTypeException($constraint, PhoneNumberConstraint::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (!preg_match('/^' . self::PHONE_REGEX . '$/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}
