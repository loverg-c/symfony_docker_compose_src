<?php

namespace App\Exceptions\API\User;

use App\Utils\Exceptions\AApiException;

class UserMethodNotMatchException extends AApiException
{
    public const STATUS = "USER_METHOD_NOT_MATCH";
}
