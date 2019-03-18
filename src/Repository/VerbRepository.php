<?php

namespace App\Repository;

use App\Entity\Verb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Verb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Verb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Verb[]    findAll()
 * @method Verb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerbRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Verb::class);
    }

    /**
     * @return Verb[]
     */
    public function findAllVerbIrregularByAlphabetical($limit = 20,  $offset = 0)
    {
        return $this->createQueryBuilder('v')
            ->select('partial v.{id, present, traduction}')
            ->andWhere('v.irregular = :val')
            ->setParameter('val', true)
            ->orderBy('v.present', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->execute()
        ;
    }

    /**
     * @return Verb[]
     */
    public function findAllVerbRegularByAlphabetical($limit = 40,  $offset = 0)
    {
        return $this->createQueryBuilder('v')
            ->select('partial v.{id, present, traduction}')
            ->andWhere('v.irregular = :val')
            ->setParameter('val', false)
            ->orderBy('v.present', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->execute()
        ;
    }

}
