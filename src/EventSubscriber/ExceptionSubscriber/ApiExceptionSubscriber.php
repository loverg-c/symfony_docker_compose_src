<?php

namespace App\EventSubscriber\ExceptionSubscriber;

use App\Utils\Exceptions\LoggerException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class ApiExceptionSubscriber implements EventSubscriberInterface
{

    public const GLOBAL_MESSAGE = 'Un problème est survenue, veuillez contacter un administrateur';

    private $loggerException;

    public function __construct(LoggerException $loggerException)
    {
        $this->loggerException = $loggerException;
    }


    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => [
                ['processException', 3],
                ['logException', 2],
                ['notifyException', 1],
                ['returnResponseException', 0],
            ]
        ];
    }

    public function processException(ExceptionEvent $event): void
    {
        //nothing here for the moment
    }

    public function logException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $this->loggerException->logException($exception);
    }

    public function notifyException(ExceptionEvent $event): void
    {
        // nothing for the moment
    }

    public function returnResponseException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $response = new JsonResponse([
            'message' => self::GLOBAL_MESSAGE,
            'error' => json_decode($exception->getMessage(), true) ?? $exception->getMessage(),
            'status' => defined(get_class($exception) . '::STATUS') ? $exception::STATUS : ''
        ], $exception instanceof HttpException ? $exception->getStatusCode() : 500);

        $event->setResponse($response);
    }
}
