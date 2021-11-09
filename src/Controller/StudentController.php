<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Entity\Student;
use App\Form\StType;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
/**
     * @Route("/addst", name="addst")
     */
    public function addStudent(Request $request): Response
    {
       
        $st=new Student();
        $form=$this->createForm(StType::class,$st);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();

        $em1=$this->getDoctrine()->getRepository(Classroom::class);
        $test=$em1->find(3);

            $st->setClassrooms($test);
            $em->persist($st);
            $em->flush();
            
        }
        return $this->render('student/addst.html.twig', [
            'f' =>$form->createView() ,
        ]);
    }
/**
     * @Route("/dql", name="dql")
     */
    public function dql(EntityManagerInterface $em)
    {
       // le traitement avec dql;
        $dql=$em->createQuery("SELECT s.id FROM App\Entity\Student s join s.classrooms c")
        ->getResult();
        //select s.id from student as s
        //->getQuery()();
        dd($dql);
        //select * from student 
return $this->render('student/stat.html.twig',[
    'nb'=>$dql[0][1]

]);
    }
    /**
     * @Route("/dqlrepo", name="dqlrepo")
     */
    public function dqlrepo(StudentRepository $repo, EntityManagerInterface $em)
    {
       // le traitement avec dql;
        $dql=$repo->getStudentsByclass($em,3);
        dd($dql);
        //select * from student 
return $this->render('student/stat.html.twig',[
    'nb'=>$dql[0][1]

]);
    }

      /**
     * @Route("/qb", name="qb")
     */
    public function qb(StudentRepository $repo)
    {
       
dd($repo->getStudents());

    }
}
