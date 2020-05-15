<?php

namespace App\Utils\FormHandler;

use App\Entity\AppUser;
use App\Utils\FormValidator\AppUserFormValidator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppUserHandler extends AHandler
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var array
     */
    private $rolesToApply = [AppUser::ROLE_APP_GUEST];

    /**
     * FieldModifierCommand constructor.
     * @param EntityManagerInterface $entityManager
     * @param AppUserFormValidator $dataValidator
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        AppUserFormValidator $dataValidator,
        UserPasswordEncoderInterface $passwordEncoder
    )
    {
        $this->entityManager = $entityManager;
        $this->dataValidator = $dataValidator;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function setRolesToApply(array $roles = [AppUser::ROLE_APP_GUEST]): void
    {
        $this->rolesToApply = $roles;
    }

    /**
     * Special treatment for AppUserType
     * @throws \Doctrine\ORM\ORMException
     * @throws \Exception
     */
    public function execute(): void
    {
        if (!empty($this->input['password'])) {
            if (!$this->passwordEncoder->isPasswordValid($this->entity, $this->input['password'])) {
                //case create or update password, for the moment its sub
                $this->input['password'] = $this->passwordEncoder->encodePassword($this->entity, $this->input['password']);
            } else {
                unset($this->input['password']);
            }
        }
        if ($this->entity instanceof AppUser) {
            $this->entity->setRoles($this->rolesToApply);
        }
        parent::execute();
    }
}
