<?php

namespace App\Utils\Validator\Constraint\General;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DateTimeConstraint extends Constraint
{
    public $message = 'The string "{{ string }}" does not match the regex datetime.';
}
