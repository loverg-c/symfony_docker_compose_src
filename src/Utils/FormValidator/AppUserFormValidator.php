<?php

namespace App\Utils\FormValidator;

use App\Entity\AppUser;
use App\Form\AppUserType;

class AppUserFormValidator extends AFormValidator
{
    final public function getFormType(): string
    {
        return AppUserType::class;
    }

    final public function checkOrGenerateEntity($object): AppUser
    {
        return $object instanceof AppUser ? $object : new AppUser();
    }
}
