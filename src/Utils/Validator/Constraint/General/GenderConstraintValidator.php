<?php

namespace App\Utils\Validator\Constraint\General;

use App\Utils\Constant\Gender\IGenderAware;
use App\Utils\Constant\Gender\TGenderAware;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * @Annotation
 */
class GenderConstraintValidator extends ConstraintValidator implements IGenderAware
{

    use TGenderAware;

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof GenderConstraint) {
            throw new UnexpectedTypeException($constraint, GenderConstraint::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }
        if (!preg_match(self::POSSIBLE_GENDER_MATCH_REGEX, $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}
