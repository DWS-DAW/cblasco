<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Position;
use AppBundle\Entity\Carrera;
use AppBundle\Entity\Corredor;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class PositionController extends Controller
{
    /**
     * @Route("/position/new", name="positionNew")
     */
    public function newPositionAction(Request $request) {
        //try{
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'No pots crear productes com a usuari!');
        
        $position = new Position();
        $form=$this->createFormBuilder($position, ['translation_domain' => 'AppBundle'])
        ->add('tiempo',TextType::class, array('label'=>'Tiempo(HH:MM:SS)'))
        ->add('corredor',TextType::class, array('label'=>'corredor'))
        ->add('carrera',EntityType::class,array('class'=>'AppBundle:Carrera', 'choice_label'=>'nombre','label'=>'carrera'))
        ->add('save',SubmitType::class, array('label'=>'save'))
        ->getForm();
        $form->handleRequest($request);
        
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($position);
            $em->flush();
            return $this->redirectToRoute('positionNew');
        }

        return $this->render('race/addPosition.html.twig',array(
                'form'=>$form->createView(),
        ));/*
        }
        catch(\Exception $AccessDeniedHttpException){
            $title="No tienes acceso a esta ruta";
            return $this->render('T6/error.html.twig',array('title'=>$title));
        }*/
        }
    /**
     * @Route("/race/{carrera}", name="positionRace")
     */
    public function racePositionAction($carrera) {


        $repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Position' );
        $title = "Clasificacion " . $carrera;
        $positions = $repository->findByCarrera($carrera, array('tiempo'=>'ASC'));
        //$categories = $this->getDoctrine ()->getRepository ( 'AppBundle:Carrera' );
        return $this->render ( 'race/positionRace.html.twig', Array (
                "title.list.forcat" => $title,
                "positions" => $positions,
                "carrera" => $carrera,
        ) );
    }

}
