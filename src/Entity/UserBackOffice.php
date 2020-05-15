<?php

namespace App\Entity;

use App\Entity\Traits\BoBlameable;
use App\Entity\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user_back_office", indexes={
 *     @ORM\Index(name="search_by_email", columns={"email"})
 * })
 */
class UserBackOffice extends AUser
{
    use Timestampable, BoBlameable;

    public const ROLE_BO_USER = 'ROLE_BO_USER';
    public const ROLE_BO_ADMIN = 'ROLE_BO_ADMIN';
    public const ROLE_BO_SUPERADMIN = 'ROLE_BO_SUPERADMIN';

    public const POSSIBLE_ROLES = [
        self::ROLE_BO_USER,
        self::ROLE_BO_ADMIN,
        self::ROLE_BO_SUPERADMIN
    ];

    public const ROLES_TRANSLATION = [
        'UTILISATEUR' => self::ROLE_BO_USER,
        'ADMIN' => self::ROLE_BO_ADMIN,
        'SUPER ADMIN' => self::ROLE_BO_SUPERADMIN
    ];

    protected const DEFAULT_ROLE = self::ROLE_BO_USER;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @Groups({"list"})
     */
    protected $email;

}
