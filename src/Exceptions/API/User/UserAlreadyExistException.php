<?php

namespace App\Exceptions\API\User;

use App\Utils\Exceptions\AApiException;

class UserAlreadyExistException extends AApiException
{
    public const STATUS = "USER_ALREADY_EXIST";
}
