<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Carrera;
use Doctrine\ORM\Mapping as ORM;

class RaceController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function homeAction()
    {
    	$title="Carreras populares";
        // replace this example code with whatever you need
        return $this->render('race/home.html.twig', array('title'=>$title
           ));
    }
    /**
     * @Route("/race/view", name="carreras")
     */
    public function viewAction() {
    	$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Carrera' );
    	$carreras = $repository->findAll ();
    	$title = "Todas las carreras";
    
    	return $this->render ( 'race/view.html.twig', Array (
    			"title" => $title,
    			"carreras" => $carreras
    			) );
    }
    /**
     * @Route("/race/add", name="añadir")
     */
    public function addAction()
    {
    	$title="Añadir carreras";
    	return $this->render('race/add.html.twig', array('title'=>$title
    	));
    }
    /**
     * @Route("race/month", name="month")
     */
    public function monthsAction()
    {
    	$title="Carreras por meses";
    	return $this->render('race/months.html.twig', array('title'=>$title
    	));
    }
    /**
     * @Route("race/first", name="first")
     */
    public function firstAction()
    {
    	$title="Proxima carrera";
    	return $this->render('race/first.html.twig', array('title'=>$title
    	));
    }
    
}
