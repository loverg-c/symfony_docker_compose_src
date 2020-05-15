<?php

namespace App\Exceptions\API\User;

use App\Utils\Exceptions\AApiException;

class UserNotFoundException extends AApiException
{
    public const STATUS = "USER_NOT_FOUND";
}
