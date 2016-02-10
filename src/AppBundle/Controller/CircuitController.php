<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Circuit;
use AppBundle\Entity\Carrera;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\WebProfilerBundle\Controller\ExceptionController;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CircuitController extends Controller
{
	
	/**
	 * @Route("/circuit/new", name="circuitNew")
	 */
	public function newCircuitAction(Request $request) {
		//try{
		//$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'No pots crear productes com a usuari!');
		$circuit = new Circuit();
		$form=$this->createFormBuilder($circuit, ['translation_domain' => 'AppBundle'])->add('name',TextType::class, array('label'=>'nombre'))
		->add('carreras',TextType::class, array('label'=>'ncarreras'))
		->add('save',SubmitType::class, array('label'=>'save'))
		->getForm();
		$form->handleRequest($request);
		
		if($form->isValid()){
			$em=$this->getDoctrine()->getManager();
			$em->persist($circuit);
			$em->flush();
			return $this->redirectToRoute('circuitNew');
		}
	
		return $this->render('race/addCircuit.html.twig',array(
				'form'=>$form->createView(),
		));/*
		}
		catch(\Exception $AccessDeniedHttpException){
			$title="No tienes acceso a esta ruta";
			return $this->render('T6/error.html.twig',array('title'=>$title));
		}*/
		}

		/**
		 * @Route("/circuit/edit/{id}", name="CircuitEdit")
		 */
		public function editCircuitAction($id, Request $request) {
			try{
			$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'No pots crear productes com a usuari!');
			$em = $this->getDoctrine ()->getManager ();
			$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Circuit' );
			$circuit = $repository->find ( $id );
			$form=$this->createFormBuilder($circuit)->add('name',TextType::class)
			->add('carreras',TextType::class, array('label'=>'narreras'))
			->add('save',SubmitType::class)
			->getForm();
			$form->handleRequest($request);
		
			if($form->isValid()){
				$em=$this->getDoctrine()->getManager();
				$em->persist($circuit);
				$em->flush();
				return $this->redirectToRoute('circuitList');
			}
		
			return $this->render('race/addCircuit.html.twig',array(
					'form'=>$form->createView(),
			));
			}
			catch(\Exception $AccessDeniedHttpException){
				$title="No tienes acceso a esta ruta";
				return $this->render('T6/error.html.twig',array('title.error'=>$title));
			}
		}
		
    /**
     * @Route("/circuit/delete/{id}", name="circuitDelete")
     */
    public function deleteCircuitAction($id)
    {
    	try{
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Circuit');
    	$circuit = $repository->find($id);
    	
    	$em->remove ( $circuit );
    	$em->flush ();

    	
    	return new Response('Circuito con id '.$id.' borrada');
    	}
			catch(\Exception $AccessDeniedHttpException){
				$title="Este circuito tiene carreras y no se te permite borrarlo";
				return $this->render('T6/error.html.twig',array('title'=>$title));
			}
  
}
    /**
     * @Route("/circuit/list", name="circuitList")
     */
    public function listCircuitAction()
    {
    	 
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Circuit');
    	$circuits = $repository->findAll();
    	$title="Circuitos";
    
    	return $this->render('race/listCircuit.html.twig', Array("title.list.cat"=>$title,"circuits"=>$circuits));
    }
    
}