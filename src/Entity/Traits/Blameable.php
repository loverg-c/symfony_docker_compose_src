<?php

namespace App\Entity\Traits;

use App\Entity\AppUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Trait Blameable
 *
 * @package App\Entity\Traits
 */
trait Blameable
{
    /**
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="AppUser")
     */
    private $createdBy;

    /**
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="AppUser")
     */
    private $updatedBy;

    /**
     * Set updatedBy
     *
     * @param AppUser $updatedBy
     *
     * @return object
     */
    public function setUpdatedBy(AppUser $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return AppUser
     */
    public function getUpdatedBy(): ?AppUser
    {
        return $this->updatedBy;
    }

    /**
     * Set createdBy
     *
     * @param AppUser $createdBy
     *
     * @return object
     */
    public function setCreatedBy(AppUser $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return AppUser
     */
    public function getCreatedBy(): ?AppUser
    {
        return $this->createdBy;
    }
}

