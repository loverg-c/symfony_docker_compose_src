<?php

namespace App\Utils\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ObjectValidator
{

    /**
     * @var ValidatorInterface $validator ,
     */
    private $validator;

    /**
     * ObjectValidator constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param mixed $object The value to validate
     * @param Constraint|Constraint[] $constraints The constraint(s) to validate against
     * @param string|GroupSequence|(string|GroupSequence)[]|null $groups      The validation groups to validate. If none is given, "Default" is assumed
     * @return array
     */
    public function validate($object, $constraints = null, $groups = null): array
    {
        $errors = $this->validator->validate($object, $constraints, $groups);
        $errorArray = [];
        foreach ($errors as $error) {
            $errorArray[$error->getPropertyPath()] = $error->getMessage();
        }
        return $errorArray;
    }


}