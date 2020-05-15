<?php

namespace App\Entity\Traits;

use App\Entity\UserBackOffice;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Blameable
 *
 * @package App\Entity\Traits
 */
trait BoBlameable
{
    /**
     * @var UserBackOffice
     *
     * @ORM\ManyToOne(targetEntity="UserBackOffice")
     */
    private $updatedBy;


    /**
     * Set updatedBy
     *
     * @param UserBackOffice $updatedBy
     *
     * @return object
     */
    public function setUpdatedBy(UserBackOffice $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return UserBackOffice
     */
    public function getUpdatedBy(): ?UserBackOffice
    {
        return $this->updatedBy;
    }
}

