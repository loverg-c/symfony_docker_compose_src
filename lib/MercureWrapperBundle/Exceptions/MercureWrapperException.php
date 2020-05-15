<?php

namespace Lib\MercureWrapperBundle\Exceptions;

use App\Utils\Exceptions\AApiException;

class MercureWrapperException extends AApiException
{
    public const STATUS = "MERCURE";
}
