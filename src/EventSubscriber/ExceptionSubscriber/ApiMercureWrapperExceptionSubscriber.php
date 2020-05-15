<?php

namespace App\EventSubscriber\ExceptionSubscriber;

use Lib\MercureWrapperBundle\Exceptions\MercureWrapperException;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ApiMercureWrapperExceptionSubscriber extends ApiExceptionSubscriber
{
    public function processException(ExceptionEvent $event): void
    {
        if (!$event->getException() instanceof MercureWrapperException) {
            return;
        }
        parent::processException($event);
    }

    public function logException(ExceptionEvent $event): void
    {
        if (!$event->getException() instanceof MercureWrapperException) {
            return;
        }
        parent::logException($event);
    }

    public function notifyException(ExceptionEvent $event): void
    {
        if (!$event->getException() instanceof MercureWrapperException) {
            return;
        }
        parent::notifyException($event);
    }

    public function returnResponseException(ExceptionEvent $event): void
    {
        if (!$event->getException() instanceof MercureWrapperException) {
            return;
        }
        parent::returnResponseException($event);
    }
}
