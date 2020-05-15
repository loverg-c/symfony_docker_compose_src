<?php

namespace App\Utils\Faker\Processor;

use App\Entity\AppUser;
use Doctrine\ORM\EntityManagerInterface;
use Fidry\AliceDataFixtures\ProcessorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppUserProcessor implements ProcessorInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
    }

    public function preProcess($id, $object): void
    {

    }

    /**
     * Processes an object after it is persisted to DB.
     *
     * @param string $id Fixture ID
     * @param object $object
     */
    public function postProcess($id, $object): void
    {
        if (!$object instanceof AppUser) {
            return;
        }
        $password = $this->passwordEncoder->encodePassword($object, $object->getPassword());
        $object->setPassword($password);
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }
}
