<?php

namespace App\Entity;

use App\Entity\Traits\Blameable;
use App\Entity\Traits\Timestampable;
use App\Utils\Validator\Constraint\General\GenderConstraint;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

/**
 * AppUser
 *
 * @ORM\Table(name="app_users", indexes={
 *     @ORM\Index(name="search_by_phonenumber", columns={"phone_number"}),
 *     @ORM\Index(name="search_by_identity", columns={"identity"})
 * })
 * @ORM\Entity()
 */
class AppUser extends AUser
{
    use Timestampable, Blameable;

    public const ROLE_APP_GUEST = 'ROLE_APP_GUEST';
    public const ROLE_APP_USER = 'ROLE_APP_USER';

    public const POSSIBLE_ROLES = [
        self::ROLE_APP_GUEST,
        self::ROLE_APP_USER
    ];

    protected const DEFAULT_ROLE = self::ROLE_APP_GUEST;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @AssertPhoneNumber
     *
     * @Groups({"getUser"})
     *
     * @SWG\Property(example="+33612345678")
     */
    private $phoneNumber;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     *
     * @Groups({"getUser"})
     *
     * @SWG\Property(example="2003-03-15")
     */
    private $birthDate;

    /**
     * @var string
     * @GenderConstraint
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"getUser"})
     *
     * @SWG\Property(example="FEMALE")
     */
    private $gender;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"getUser"})
     * @SWG\Property(example="PARIS")
     */
    private $birthPlace;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"getUser"})
     * @SWG\Property(example="FRANCE")
     */
    private $birthCountry;

    /**
     * @var @ORM\Column(type="string", unique=true, nullable=true)
     * @Groups({"getUser"})
     */
    private $openId;

    public function getOpenId()
    {
        return $this->openId;
    }

    public function setOpenId($openId): self
    {
        $this->openId = $openId;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getBirthDate(): ?DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime $birthDate
     */
    public function setBirthDate(DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    /**
     * @param string $birthPlace
     */
    public function setBirthPlace(string $birthPlace): void
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return string
     */
    public function getBirthCountry(): ?string
    {
        return $this->birthCountry;
    }

    /**
     * @param string $birthCountry
     */
    public function setBirthCountry(string $birthCountry): void
    {
        $this->birthCountry = $birthCountry;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
