<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Circuit;
use AppBundle\Entity\Carrera;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CarreraController extends Controller {

		/**
		 * @Route("/admi")
		 */
		public function adminsAction()
		{
			return new Response('<html><body>Admin page!</body></html>');
		}

		/**
		 * @Route("/race/new", name="carreraNew")
		 */
		public function newraceAction(Request $request)
		{
			$carrera = new Carrera();
			$form=$this->createFormBuilder($carrera, ['translation_domain' => 'AppBundle'])->add('nombre',TextType::class, array('label'=>'nombre'))
			->add('distancia',TextType::class, array('label'=>'distancia'))
			->add('localidad',TextType::class, array('label'=>'localidad'))
			->add('tipo',TextType::class, array('label'=>'tipo'))
			->add('fecha',TextType::class, array('label'=>'Fecha (DD/MM/YY)'))
			->add('precio',MoneyType::class, array('label'=>'precio'))
			->add('web',TextType::class, array('label'=>'url','required'=>false))
			->add('descripcion',TextType::class, array('label'=>'descripcion','required'=>false))
			->add('circuito',EntityType::class,array('class'=>'AppBundle:Circuit', 'choice_label'=>'name','label'=>'circuit'))
			->add('save',SubmitType::class,array('label'=>'save'))
			->add('saveAndAdd',SubmitType::class, array('label'=>'saveAdd'))
			->getForm();
			$form->handleRequest($request);
			if($form->isValid())
			{
				$em=$this->getDoctrine()->getManager();
				$em->persist($carrera);
				$em->flush();
				$nextAction=$form->get('saveAndAdd')->IsClicked()
				?'carreraNew'
				:'carreraList';
				return $this->redirectToRoute($nextAction);
			}
			return $this->render('race/addRace.html.twig',array('form'=>$form->createView()));
		}

		/**
		 * @Route("/race/edit/{id}", name="raceEdit")
		 */
		public function editraceAction($id, Request $request) {
			try{
			//$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'No pots crear productes com a usuari!');
			$em = $this->getDoctrine ()->getManager ();
			$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Carrera' );
			$carrera = $repository->find ( $id );
		
			$form=$this->createFormBuilder($carrera)->add('nombre',TextType::class)
			->add('distancia',TextType::class, array('label'=>'distancia'))
			->add('localidad',TextType::class, array('label'=>'descripcion'))
		    ->add('tipo',TextType::class, array('label'=>'descripcion'))
		    ->add('fecha',TextType::class, array('label'=>'fecha (DD/MM/YY)'))
		    ->add('precio',MoneyType::class, array('label'=>'precio'))
		    ->add('web',TextType::class, array('label'=>'descripcion','required'=>false))
		    ->add('descripcion',TextType::class, array('label'=>'descripcion','required'=>false))
		    ->add('circuito',EntityType::class,array('class'=>'AppBundle:Circuit', 'choice_label'=>'name','label'=>'circuit'))
		    ->add('save',SubmitType::class,array('label'=>'Guardar'))
			->add('saveAndAdd',SubmitType::class,array('label'=>'Guardar y continuar'))
			->getForm();
			$form->handleRequest($request);
		
			if($form->isValid()){
				$em=$this->getDoctrine()->getManager();
				$em->persist($carrera);
				$em->flush();
				$nextAction=$form->get('saveAndAdd')->IsClicked()
				?'carreraNew'
				:'carreraList';
							
						return $this->redirectToRoute($nextAction);
			}
		
			return $this->render('race/addRace.html.twig',array(
					'form'=>$form->createView(),
			));
			}
			catch(\Exception $AccessDeniedHttpException){
				$title="No tienes acceso a esta ruta";
				return $this->render('T6/error.html.twig',array('title.error'=>$title));
			}
		}
	
	/**
	 * @Route("/race/show/{id}", name="raceShow")
	 */
	public function showraceAction($id) {
		$product = $this->getDoctrine ()->getRepository ( 'AppBundle:Carrera' )->find ( $id );
		
		if (! $product) {
			throw $this->createNotFoundException ( 'No product found for id ' . $id );
		}
		
		return new Response ( 'ID Producto ' . $product->getId () . '<br>Nombre: ' . $race->getName () . '<br>Precio: ' . $product->getPrice () . '<br>Descripción: ' . $product->getDescription () );
	}
	
	/**
	 * @Route("/race/list", name="carreraList")
	 */
	public function listraceAction() {
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Carrera' );
		$races = $repository->findAll ();
		
		return $this->render ( 'race/listRace.html.twig', Array (
				"carreras" => $races 
		) );
	}

	/**
	 * @Route("/race/delete/{id}", name="raceDelete")
	 */
	public function deleteAction($id) {
		try{
		$em = $this->getDoctrine ()->getManager ();
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Carrera' );
		$race = $repository->find ( $id );
		
		$em->remove ( $race );
		$em->flush ();
		
		return new Response ( 'Carrera con id ' . $id . ' borrado' );
		}
			catch(\Exception $AccessDeniedHttpException){
				$title="No puedes borrar la carrera (para ello se debe borrar en cascada)";
				return $this->render('T6/error.html.twig',array('title'=>$title));
			}
	}
	
	/**
	 * @Route("/race/circuit/{circuit}", name="raceListForCircuit")
	 */
	public function listbycircuitAction($circuit) {


		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Carrera' );
		$races = $repository->findByCircuito($circuit);
		return $this->render ( 'race/raceForCircuit.html.twig', Array (
				"carreras" => $races,"circuit"=>$circuit
		) );
	}
	
	/**
	 * @Route("/product/list/circuit", name="raceListForCircuits")
	 */
	public function listbycircuitsAction() {
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Circuit' );
		$circuits = $repository->findAll ();
		
		return $this->render ( 'race/raceForCircuits.html.twig', Array (
				"circuits" => $circuits
		) );
	}
}