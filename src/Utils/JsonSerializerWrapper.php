<?php

namespace App\Utils;

use Symfony\Component\Serializer\SerializerInterface;

class JsonSerializerWrapper
{
    /**
     * @var string
     */
    private $encodeFormat;

    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var GroupManager
     */
    private $groupManager;

    public function __construct(SerializerInterface $serializer, GroupManager $groupManager)
    {
        $this->groupManager = $groupManager;
        $this->serializer = $serializer;
        $this->encodeFormat = 'json';
    }

    public function serialize($data, array $context = [], array $groupsSerialize = []): string
    {
        $groups = array_merge($this->groupManager->getCurrentUserSerializationGroup() ?? [], $groupsSerialize);
        return $this->serializer->serialize($data, $this->encodeFormat, array_merge($context, ['groups' => $groups]));
    }

    public function deserialize(string $data, $type, array $context = [], array $groupsSerialize = []): object
    {
        $groups = array_merge($this->groupManager->getCurrentUserSerializationGroup() ?? [], $groupsSerialize);
        return $this->serializer->deserialize($data, $type, $this->encodeFormat, array_merge($context, ['groups' => $groups]));
    }
}
