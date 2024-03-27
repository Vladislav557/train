<?php

namespace App\Repository;

use App\Entity\PaymentPeriodModifier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PaymentPeriodModifier>
 *
 * @method PaymentPeriodModifier|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentPeriodModifier|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentPeriodModifier[]    findAll()
 * @method PaymentPeriodModifier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentPeriodModifierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaymentPeriodModifier::class);
    }

    public function save(PaymentPeriodModifier $paymentPeriodModifier): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager
            ->persist($paymentPeriodModifier);
        $entityManager
            ->flush();
    }
}
