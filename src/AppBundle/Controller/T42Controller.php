<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class T42Controller extends Controller
{
   
 
    /**
     * @Route("/T42/", name="index")
     */
    function indexAction()
    {
    	$nav=["home","about","contact"];
    	$title="Welcome";
    	$p="";
    	$input="";
    	return $this->render('T42/T42.html.twig', array("title"=>$title,
    			"nav"=>$nav, "p"=>$p, "input"=>$input
    	));
    }
    /**
     * @Route("/T42/about", name="about")
     */
    function aboutAction()
    {
    $input="";
    $nav=["home","about","contact"];
    $title="Informacion";
    $p="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
    sunt in culpa qui officia deserunt mollit anim id est laborum.";
    return $this->render('T42/T42.html.twig', array("title"=>$title, "p"=>$p, "nav"=>$nav, "input"=>$input));
    }
    /**
     * @Route("/T42/contact", name="contact")
     */
    function contactAction()
    {
    $p="";
    $nav=["home","about","contact"];
    $title="Contacto";
    $input=["text","email"];
    return $this->render('T42/T42.html.twig', array("title"=>$title, "p"=>$p, "nav"=>$nav, "input"=>$input));
    }
}