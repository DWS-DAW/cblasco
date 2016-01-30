<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
class DefaultController extends Controller
{
	
	
		/**
		 * @Route("/admin")
		 */
		public function adminAction()
		{
			return new Response('<html><body>Admin page!</body></html>');
		}
	
	
	
	
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('heroku.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/bienvenida/{name}", name="hello")
     */
    public function helloAction($name)
    {
    	return new Response('<html><body>Hello '.$name.'!</body></html>');
    }
}