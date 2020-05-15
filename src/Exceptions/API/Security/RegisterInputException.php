<?php

namespace App\Exceptions\API\Security;

use App\Utils\Exceptions\AApiException;

class RegisterInputException extends AApiException
{
    public const STATUS = "REGISTER_INPUT_DATA";
}
