<?php

namespace App\Utils\FormValidator;

use Symfony\Component\Form\FormFactoryInterface;

abstract class AFormValidator
{
    /** @var FormFactoryInterface */
    protected $formFactory;

    abstract public function getFormType(): string;

    abstract public function checkOrGenerateEntity($object);

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function validate(&$object, array $params = [], $clearMissing = true): bool
    {
        $form = $this->formFactory->create($this->getFormType(), $object);
        $form->submit($params, $clearMissing);
        return $form->isValid();
    }
}
