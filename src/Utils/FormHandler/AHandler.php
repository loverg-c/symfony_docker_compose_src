<?php

namespace App\Utils\FormHandler;

use App\Utils\FormValidator\AFormValidator;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

abstract class AHandler
{

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var AFormValidator
     */
    protected $dataValidator;

    /**
     * @var array
     */
    protected $input = [];

    /**
     * @var mixed
     */
    protected $entity;

    /**
     * @var mixed
     */
    protected $output;

    /**
     * @param array $input
     * @param null $entity
     * @return mixed
     * @throws ORMException
     */
    final public function handle(array $input = [], $entity = null)
    {
        $this->input = $input;
        $this->entity = $this->dataValidator->checkOrGenerateEntity($entity);
        try {
            $this->execute();

        } catch (ORMException $e) {
            throw $e;
        }

        return $this->output ?: null;
    }

    /**
     * You can override it in child
     * @throws ORMException
     */
    public function execute(): void
    {
        try {
            if ($this->dataValidator->validate($this->entity, $this->input, false)) {
                $this->entityManager->persist($this->entity);
                $this->entityManager->flush();
                $this->output = $this->entity;
            }
        } catch (ORMException $e) {
            throw $e;
        }
    }
}
