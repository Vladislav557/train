<?php

namespace App\Repository;

use App\Entity\AgeModifier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgeModifier>
 *
 * @method AgeModifier|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgeModifier|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgeModifier[]    findAll()
 * @method AgeModifier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgeModifierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgeModifier::class);
    }

    public function save(AgeModifier $ageModifier): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager
            ->persist($ageModifier);
        $entityManager
            ->flush();
    }
}
