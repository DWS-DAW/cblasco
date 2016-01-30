<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProductController extends Controller {
	

	/**
	 * @Route("/product/new", name="productNew")
	 */
	public function newProductAction(Request $request) {
		//try{
		$product = new Product();
		
		//$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'No pots crear productes com a usuari!');
		
		$form=$this->createFormBuilder($product, ['translation_domain' => 'AppBundle'])->add('name',TextType::class, array('label'=>'nombre'))
		->add('description',TextType::class, array('label'=>'descripcion'))
		->add('price',MoneyType::class, array('label'=>'precio'))
		->add('category',EntityType::class,array('class'=>'AppBundle:Category', 'choice_label'=>'name','label'=>'categoria'))
		->add('save',SubmitType::class,array('label'=>'save'))
		->add('saveAndAdd',SubmitType::class, array('label'=>'saveAdd'))
		->getForm();
		$form->handleRequest($request);
		
		if($form->isValid()){
			$em=$this->getDoctrine()->getManager();
			$em->persist($product);
			$em->flush();
			$nextAction=$form->get('saveAndAdd')->IsClicked()
			?'productNew'
			:'productList';
			
			return $this->redirectToRoute($nextAction);
		}
		
		return $this->render('default/new.html.twig',array(
				'form'=>$form->createView(),
		));
		/*}
		catch(\Exception $AccessDeniedHttpException){
			$title="No tienes acceso a esta ruta";
			return $this->render('T6/error.html.twig',array('title'=>$title));
		}*/
	}

		/**
		 * @Route("/product/edit/{id}", name="productEdit")
		 */
		public function editProductAction($id, Request $request) {
			try{
			$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'No pots crear productes com a usuari!');
			$em = $this->getDoctrine ()->getManager ();
			$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Product' );
			$product = $repository->find ( $id );
		
			$form=$this->createFormBuilder($product)->add('name',TextType::class)
			->add('description',TextType::class)
			->add('price',MoneyType::class)
			->add('category',EntityType::class,array('class'=>'AppBundle:Category', 'choice_label'=>'name'))
			->add('save',SubmitType::class,array('label'=>'Guardar'))
			->add('saveAndAdd',SubmitType::class,array('label'=>'Guardar y continuar'))
			->getForm();
			$form->handleRequest($request);
		
			if($form->isValid()){
				$em=$this->getDoctrine()->getManager();
				$em->persist($product);
				$em->flush();
				$nextAction=$form->get('saveAndAdd')->IsClicked()
				?'productNew'
						:'productList';
							
						return $this->redirectToRoute($nextAction);
			}
		
			return $this->render('default/new.html.twig',array(
					'form'=>$form->createView(),
			));
			}
			catch(\Exception $AccessDeniedHttpException){
				$title="No tienes acceso a esta ruta";
				return $this->render('T6/error.html.twig',array('title.error'=>$title));
			}
		}
		
	/**
	 * @Route("/product/create", name="Creando_producto")
	 */
	public function createStaticAction() {
		
		// Guarda en la categoria 1
		$category = $this->getDoctrine ()->getRepository ( 'AppBundle:Category' )->find ( 1 );
		$product = new Product ();
		$product->setName ( 'A Foo Bar' );
		$product->setPrice ( '19.99' );
		$product->setDescription ( 'Lorem ipsum dolor' );
		$product->setCategory ( $category );
		
		$em = $this->getDoctrine ()->getManager ();
		$em->persist ( $product );
		$em->flush ();
		
		return new Response ( 'Created product id ' . $product->getId () );
	}
	
	/**
	 * @Route("/product/show/{id}", name="Viendo_producto")
	 */
	public function showAction($id) {
		$product = $this->getDoctrine ()->getRepository ( 'AppBundle:Product' )->find ( $id );
		
		if (! $product) {
			throw $this->createNotFoundException ( 'No product found for id ' . $id );
		}
		
		return new Response ( 'ID Producto ' . $product->getId () . '<br>Nombre: ' . $product->getName () . '<br>Precio: ' . $product->getPrice () . '<br>Descripción: ' . $product->getDescription () );
	}
	
	/**
	 * @Route("/product/list", name="productList")
	 */
	public function listAction() {
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Product' );
		$products = $repository->findAll ();
		$title = "Listado de productos";
		
		return $this->render ( 'T5/list.html.twig', Array (
				"title.list.prod" => $title,
				"products" => $products 
		) );
	}
	
	/**
	 * @Route("/product/create/{name}/{price}/{cat}", name="Crear_produto")
	 */
	public function createParamAction($name, $price, $cat) {
		if (preg_match ( '/^\d\d(\.\d\d)?$/', $price )) {
			// crea producto en la categoria $cat
			$category = $this->getDoctrine ()->getRepository ( 'AppBundle:Category' )->find ( $cat );
	
			$product = new Product ();
			$product->setName ( $name );
			$product->setPrice ( $price );
			$product->setDescription ( $name );
			$product->setCategory ( $category );
			$em = $this->getDoctrine ()->getManager ();
	
			
				$em->persist ( $product );
				$em->flush ();
	
				return new Response ( 'Producto creado <br>Id= ' . $product->getId () . '<br>Nombre = '.
						$product->getName () . '<br>Precio = ' . $product->getPrice () . '<br>Categoria = '.$category->getId());
			
		
		}
	
		else
			throw $this->createNotFoundException ( 'Formato de precio invalido' );
	}
	
	/**
	 * @Route("/product/delete/{id}", name="Borrar_producto")
	 */
	public function deleteAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Product' );
		$product = $repository->find ( $id );
		
		$em->remove ( $product );
		$em->flush ();
		
		return new Response ( 'Producto con id ' . $id . ' borrado' );
	}
	
	/**
	 * @Route("/product/list/category/{category}", name="Articulos_de_categoria")
	 */
	public function listByCategoryAction($category) {


		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Product' );
		$title = "Listado de productos de la categoria " . $category;
		$products = $repository->findByCategory($category);
		//$categories = $this->getDoctrine ()->getRepository ( 'AppBundle:Category' );
		return $this->render ( 'T5/product.category.html.twig', Array (
				"title.list.forcat" => $title,
				"products" => $products,
				//"categories"=> $categories,
				//"categoria"=>$category
		) );
	}
	
	/**
	 * @Route("/product/list/category", name="Todos_productos")
	 */
	public function listAIIBCategoryAction() {
		$repository = $this->getDoctrine ()->getRepository ( 'AppBundle:Category' );
		$categories = $repository->findAll ();
		$title = "Listado de productos por categoria";
		
		return $this->render ( 'T5/category.list.html.twig', Array (
				"title.list.prodcat" => $title,
				"categories" => $categories
		) );
	}
}