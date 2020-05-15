<?php

namespace App\Repository;

use App\Entity\Help;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HelpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Help::class);
    }

    public function findBySubjectOrPage(string $subject = null, string $page = null): array
    {
        $qb = $this->createQueryBuilder('h')
            ->where('h.isActive = true');
        if ($subject) {
            $qb->andWhere('h.subject = :subject')
                ->setParameter('subject', $subject);
        }
        if ($page) {
            $qb->andWhere('h.page = :page')
                ->setParameter('page', $page);
        }
        return $qb->getQuery()->getResult();
    }
}
