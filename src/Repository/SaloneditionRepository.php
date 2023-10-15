<?php
// /src/Repository/SaloneditionRepository.php
namespace App\Repository;

use App\Entity\Salonedition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Salonedition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Salonedition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Salonedition[]    findAll()
 * @method Salonedition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Salonedition::class);
    }
     /**
      * @return Salonedition[] Returns an array of Salonedition objects
     */
    
     public function lastTree($value)
     {
         return $this->createQueryBuilder('c')
             ->orderBy('c.id', 'DESC')
             ->setMaxResults(3)
             ->getQuery()
             ->getResult()
         ;
     }

    // /**
    //  * @return MyEntity[] Returns an array of MyEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MyEntity
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}