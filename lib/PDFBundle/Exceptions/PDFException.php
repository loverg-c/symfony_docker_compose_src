<?php

namespace Lib\PDFBundle\Exceptions;

use App\Utils\Exceptions\AApiException;

class PDFException extends AApiException
{
    public const STATUS = "PDF";
}
