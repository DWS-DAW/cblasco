<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoryController extends Controller
{
	
	/**
	 * @Route("/category/new", name="Categoria_nueva")
	 */
	public function newCategoryAction(Request $request) {
		$category = new Category();
	
		$form=$this->createFormBuilder($category)->add('name',TextType::class)
		->add('save',SubmitType::class)
		->getForm();
		$form->handleRequest($request);
		
		if($form->isValid()){
			$em=$this->getDoctrine()->getManager();
			$em->persist($category);
			$em->flush();
			return $this->redirectToRoute('categoryList');
		}
	
		return $this->render('default/new.html.twig',array(
				'form'=>$form->createView(),
		));
		}
    /**
     * @Route("/category/create/{name}", name="Creando_categoria")
     */
    public function createAction($name)
    {
    	if(preg_match('/^\w{1,100}$/', $name)){
    	$category = new Category();
    	$category->setName($name);
    	
    	
    	$em = $this->getDoctrine()->getManager();
    	
    	$em->persist($category);
    	$em->flush();
    	
    	return new Response('Categoria creada <br>Id= '.$category->getId().
    			'<br>Nombre = '.$category->getName());	
    }
    else{
    	throw $this->createNotFoundException(
    			'Formato de nombre invalido');
    }
    }
    
    /**
     * @Route("/category/delete/{id}", name="Borrar_categoria")
     */
    public function deleteAction($id)
    {
    
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Category');
    	$category = $repository->find($id);
    

    	
    	 
    	$em->remove($category);
    	$em->flush();
    	
    	return new Response('Categoria con id '.$id.' borrada');
    }
    
    /**
     * @Route("/category/list", name="categoryList")
     */
    public function listAction()
    {
    	 
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Category');
    	$categories = $repository->findAll();
    	$title="Categorias";
    
    	return $this->render('T5/listcat.html.twig', Array("title"=>$title,"categories"=>$categories));
    }
    
}