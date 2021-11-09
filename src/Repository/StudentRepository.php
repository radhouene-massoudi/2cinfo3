<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry )
    {
        parent::__construct($registry, Student::class);
      
    }

    // /**
    //  * @return Student[] Returns an array of Student objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Student
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getStudentsByclass(EntityManagerInterface $em,$id){
        $reuslt=$em
        ->createQuery("SELECT s.name student, c.name,c.id 
        FROM App\Entity\Student s
         join s.classrooms c where c.id=?1 ")
        //->setParameter('id',$id)
        ->setParameter('1',$id)
        //->getSQL();
        ->getResult();
        //dd($reuslt);
    return $reuslt;
    }
    public function getStudents(){
        $dql="SELECT s FROM App\Entity\Student s";
        $reuslt=$this
        ->createQueryBuilder('s')
        ->select('s.name')
        ->getQuery()
        ->getResult();
   
        return $reuslt;
    }
}
