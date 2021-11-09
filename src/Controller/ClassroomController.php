<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\GradeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    /**
     * @Route("/classroom", name="classroom")
     */
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }
    /**
     * @Route("/addcl", name="addcl")
     */
    public function addClassroom(Request $request)
    {
       $klass= new Classroom();
       $form=$this->createForm(GradeType::class,$klass);
       $form->handleRequest($request);
       if ($form->isSubmitted()){
           $em=$this->getDoctrine()->getManager();
           $em->persist($klass);
           $em->flush();
       }
        return $this->render('classroom/addclassroom.html.twig', [
            'f' => $form->createView(),
        ]);
    }
}
