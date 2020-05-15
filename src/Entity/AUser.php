<?php

namespace App\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Traits\Blameable;
use App\Entity\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

abstract class AUser implements UserInterface
{
    public const POSSIBLE_ROLES = [];
    protected const DEFAULT_ROLE = NULL;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"admin"})
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"getUser"})
     * @SWG\Property(example="Henry")
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", nullable=false)
     * @Groups({"getUser"})
     * @SWG\Property(example="Henry")
     */
    protected $username;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"getUser"})
     * @SWG\Property(example="Targarien")
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @Groups({"getUser"})
     * @SWG\Property(example="+33612345678")
     */
    protected $identity;

    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     * @Groups({"getUser"})
     * @SWG\Property(example="test@test.com")
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;

    /**
     * @ORM\Column(name="roles", type="array")
     * @Groups({"bo_admin_list"})
     * @var array
     */
    protected $roles;

    public function __construct()
    {
        $this->roles = empty(static::DEFAULT_ROLE) ? [] : [static::DEFAULT_ROLE];
    }


    final public function getUsername(): ?string
    {
        return $this->username;
    }

    final public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    final public function getId(): ?int
    {
        return $this->id;
    }

    final public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    final public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    final public function getLastName(): ?string
    {
        return $this->lastName;
    }

    final public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    final public function getEmail(): ?string
    {
        return $this->email;
    }

    final public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    final public function getPassword(): ?string
    {
        return $this->password;
    }

    final public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    final public function addRole(string $role): self
    {
        if (in_array($role, static::POSSIBLE_ROLES, false)
            && !in_array($role, $this->roles, false)) {
            $this->roles[] = $role;
        }
        return $this;
    }

    final public function removeRole(string $role): self
    {
        if (($key = array_search($role, $this->roles, false)) !== false) {
            unset($this->roles[$key]);
        }
        return $this;
    }

    final public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param string $role
     * @return bool
     */
    final public function hasRole(string $role): bool
    {
        return in_array($role, $this->roles, true);
    }

    /**
     * @return string
     */
    public function getIdentity(): ?string
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     * @return AUser
     */
    public function setIdentity($identity): self
    {
        $this->identity = $identity;
        return $this;
    }

    final public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    final public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {

    }

    final public function getFullName(): ?string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
    public function isAdmin()
    {
        return (in_array(UserBackOffice::ROLE_BO_SUPERADMIN, $this->roles) ||
            in_array(UserBackOffice::ROLE_BO_ADMIN, $this->roles));
    }
}
