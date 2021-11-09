<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\ClType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
    /**
    * @Route("/show", name="show")
    */
    public function fetchClub(): Response
    {
        $em=$this->getDoctrine()->getRepository(Club::class);
        $result=$em->findAll();
        //dd($result);
        
        return $this->render('club/listofclub.html.twig', [
            'result' => $result,
        ]);
    }
    
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteClub($id): Response
    {
        $em=$this->getDoctrine()->getRepository(Club::class);
        $club=$em->find($id);
        
        $em=$this->getDoctrine()->getManager();
        $em->remove($club);
        $em->flush();
        //$result=$em->findAll();
        //dd($result);
        
        return $this->redirectToRoute('show');
    }

     /**
     * @Route("/add", name="addClub")
     */
    public function addClub(Request $req)
    {
        $club=new Club();
//$club->setName('ahmed');
//$club->setAdresse('tunis');
        $form=$this->createForm(ClType::class,$club);
$form->handleRequest($req);
//dd($req);
if ($form->isSubmitted()) {
   // dd($club);
    $em=$this->getDoctrine()->getManager();
    $em->persist($club);
    $em->flush();
    return $this->redirectToRoute('show');
}
        
        return $this->render('club/addclub.html.twig',[
            'f'=>$form->createView()
        ]);


        
    }


    /**
     * @Route("/update/{id}", name="delete")
     */
    public function update($id, Request $req): Response
    {
        $em=$this->getDoctrine()->getRepository(Club::class);
        $club=$em->find($id);
        $form=$this->createForm(ClType::class,$club);
    $form->handleRequest($req);
if ($form->isSubmitted()) {
    $em=$this->getDoctrine()->getManager();
   // $em->persist($club);
    $em->flush();
    return $this->redirectToRoute('show');
}
        
        return $this->render('club/updateclub.html.twig',[
            'f'=>$form->createView()
        ]);
    }
}
