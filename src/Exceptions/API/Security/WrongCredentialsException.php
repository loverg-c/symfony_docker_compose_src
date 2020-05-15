<?php

namespace App\Exceptions\API\Security;


use App\Utils\Exceptions\AApiException;

class WrongCredentialsException extends AApiException
{
    public const STATUS = "WRONG_CREDENTIALS";
}
