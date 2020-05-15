<?php

namespace App\Utils\Exceptions;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LoggerException
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logException(\Throwable $exception, array $context = []): void
    {
        $log = [
            'code' => $exception instanceof HttpException ? $exception->getStatusCode() : $exception->getCode(),
            'message' => $exception->getMessage(),
            'called' => [
                'file' => $exception->getTrace()[0]['file'] ?? '',
                'line' => $exception->getTrace()[0]['line'] ?? '',
            ],
            'occurred' => [
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ],
        ];

        if (0 < count($context)) {
            $log += $context;
        }

        if ($exception->getPrevious() instanceof \Exception) {
            $log += [
                'previous' => [
                    'message' => $exception->getPrevious()->getMessage(),
                    'exception' => get_class($exception->getPrevious()),
                    'file' => $exception->getPrevious()->getFile(),
                    'line' => $exception->getPrevious()->getLine(),
                ],
            ];
        }

        $this->logger->error(\json_encode($log));
    }
}
