<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Softdeleteable
 */
trait Softdeleteable
{
    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $deletedAt;


    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return object
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt(): \DateTime
    {
        return $this->deletedAt;
    }
}

