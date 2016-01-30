<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Person;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class PersonController extends Controller {
	

	/**
	 * @Route("/person/new", name="personNew")
	 */
	public function newPersonAction(Request $request) {
		//try{
		//$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'No pots crear productes com a usuari!');
		$person = new Person();
		$form=$this->createFormBuilder($person, ['translation_domain' => 'AppBundle'])
		->add('name',TextType::class,array('label'=>'nombre'))
		->add('age',TextType::class,array('label'=>'edad','required'=>false))
		->add('birthDate',DateType::class, array('years'=>range(1935,2000),'label'=>'nac'))
		->add('height',TextType::class,array('label'=>'altura','required'=>false))
		->add('email',TextType::class,array('label'=>'email'))
		->add('phone',TextType::class,array('label'=>'tel'))
		->add('gender',ChoiceType::class,array('choices'=>
				array('Male'=> 'm','Female'=>'f'),'label'=>'Sexo'))
		->add('descends',NumberType::class,array('label'=>'desc','required'=>false))
		->add('vehicle',CheckboxType::class,array(
				'label'    => 'vehiculo',
				'required' => false))
		->add('preferredLanguaje',LanguageType::class,array('label'=>'lenguaje'))
		->add('englishLevel',ChoiceType::class,array('choices'=>
				array('1'=> 1,'2'=> 2,'3'=>3),'label'=>'ningles'))
				
		->add('personalWebSite',TextType::class,array('label'=>'urlpersonal','required'=>false))
		->add('cardNumber',TextType::class,array('label'=>'creditoDebito','required'=>false))
		->add('IBAN',TextType::class,array(
				'label'    => 'Número de cuenta bancaria internacional','required'=>false))
		->add('Enviar',SubmitType::class,array('label'=>'Enviar'))
		->getForm();
		$form->handleRequest($request);
		
		if($form->isValid()){
			$em=$this->getDoctrine()->getManager();
			$em->persist($person);
			$em->flush();
			
			return $this->redirectToRoute('personList');
		}
		$title='Creando nueva persona';
		return $this->render('T6/new.html.twig',array(
				'form'=>$form->createView(),'title'=>$title
		));
		/*}
		catch(\Exception $AccessDeniedHttpException){
			$title="No tienes acceso a esta ruta";
			return $this->render('T6/error.html.twig',array('title'=>$title));
		}*/
		}
	
	/**
	 * @Route("/person/show/{id}", name="personView")
	 */
	public function showAction($id) {
		$person = $this->getDoctrine ()->getRepository ( 'AppBundle:Person' )->find ( $id );
		$title='Detalles de la persona';
		if (! $person) {
			throw $this->createNotFoundException ( 'No person for id ' . $id );
		}
		return $this->render ( 'T6/personView.html.twig', Array (
				"title" => $title,
				"person" => $person
				) );
			}
	
	/**
	 * @Route("/person/list", name="personList")
	 */
	public function listAction() {
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Person' );
		$persons = $repository->findAll ();
		$title = "Listado de la gente";
		
		return $this->render ( 'T6/personList.html.twig', Array (
				"title.list.pers" => $title,
				"persons" => $persons
		) );
	}
	
	
	/**
	 * @Route("/person/delete/{id}", name="personDelete")
	 */
	public function deleteAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Person' );
		$person = $repository->find ( $id );
		
		$em->remove ( $person );
		$em->flush ();

		return $this->redirectToRoute('personList');
		
	}
	
}