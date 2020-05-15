<?php

namespace Lib\MercureWrapperBundle\MercureWrapper;

use Lib\MercureWrapperBundle\Exceptions\MercureWrapperException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mercure\PublisherInterface;
use Symfony\Component\Mercure\Update;

class MercureWrapper
{
    /**
     * @var PublisherInterface
     */
    private $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @param $data
     * @param $topic
     */
    public function sendDataToSSE($data, $topic): void
    {
        try {
            $update = new Update($topic, $data);
            $this->publisher->__invoke($update);
        } catch (\Exception $e) {
            throw new MercureWrapperException(JsonResponse::HTTP_NOT_FOUND, 'Problem with mercure', $e);
        }
    }
}
