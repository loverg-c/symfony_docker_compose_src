<?php

namespace App\Utils\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class AApiException extends HttpException
{
    public const STATUS = "";
}
