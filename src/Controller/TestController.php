<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test123")
     */
    public function index(): Response
    {//
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
/**
     * @Route("/firstpage/{klass}", name="abc")
     */
    public function fistmethode($klass){

        return $this->render('test/firstpage.html.twig',[
            'test'=>$klass
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home(){
        $name='mahdi';
        $formations = array(
            array('ref' => 'form147', 'Titre' => 'Formation Symfony
            4','Description'=>'formation pratique',
            'date_debut'=>'12/06/2020', 'date_fin'=>'19/06/2020',
            'nb_participants'=>19) ,
            array('ref'=>'form177','Titre'=>'Formation SOA' ,
            'Description'=>'formation
            theorique','date_debut'=>'03/12/2020','date_fin'=>'10/12/2020',
            'nb_participants'=>0),
            array('ref'=>'form178','Titre'=>'Formation Angular' ,
            'Description'=>'formation
            theorique','date_debut'=>'10/06/2020','date_fin'=>'14/06/2020',
            'nb_participants'=>12));
return $this->render('home/home.html.twig',
[
    'k'=>$name,
'f'=>$formations
]);
    }


 /**
     * @Route("/detail/{ref}", name="detailof")
     */
    public function detailFormation($ref)
    {
        $formations = array(
            array('ref' => 'form147', 'Titre' => 'Formation Symfony
            4','Description'=>'formation pratique',
            'date_debut'=>'12/06/2020', 'date_fin'=>'19/06/2020',
            'nb_participants'=>19) ,
            array('ref'=>'form177','Titre'=>'Formation SOA' ,
            'Description'=>'formation
            theorique','date_debut'=>'03/12/2020','date_fin'=>'10/12/2020',
            'nb_participants'=>0),
            array('ref'=>'form178','Titre'=>'Formation Angular' ,
            'Description'=>'formation
            theorique','date_debut'=>'10/06/2020','date_fin'=>'14/06/2020',
            'nb_participants'=>12));
        
            return $this->render('home/detail.html.twig',
            [
                'ref'=>$ref,
            'formations'=>$formations
            ]);
    }
}
