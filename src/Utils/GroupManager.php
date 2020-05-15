<?php

namespace App\Utils;

use App\Entity\AppUser;
use App\Entity\UserBackOffice;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class GroupManager
{
    public const SERIALIZATION_GROUPS_ROLES = [
        AppUser::ROLE_APP_GUEST => 'guest',
        AppUser::ROLE_APP_USER => 'user',
        UserBackOffice::ROLE_BO_USER => 'bo_user',
        UserBackOffice::ROLE_BO_ADMIN => 'bo_admin',
        UserBackOffice::ROLE_BO_SUPERADMIN => 'bo_super_admin'
    ];

    /**
     * @var TokenStorageInterface
     */
    private $storage;

    public function __construct(TokenStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function getCurrentUserSerializationGroup(array $groups = []): array
    {
        $outputGroups = $groups;
        $token = $this->storage->getToken();
        if ($token instanceof TokenInterface && $token->getUser() instanceof UserInterface) {
            foreach ($token->getUser()->getRoles() as $role) {
                foreach ($groups as $group) {
                    $roleSr = (self::SERIALIZATION_GROUPS_ROLES[$role] ?: '') . '_' . $group;
                    if ($roleSr !== '_' . $group && !in_array($roleSr, $outputGroups, false)) {
                        $outputGroups[] = $roleSr;
                    }
                }
            }
        }
        return array_unique($outputGroups);
    }
}
