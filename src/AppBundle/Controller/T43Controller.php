<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class T43Controller extends Controller
{
	public function formatAction($year, $_format){
		$title="Datos alumnos con formato ".$_format;
		$data = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
   if($_format=='html'){
   	return $this->render('T43/format.html.twig', Array("data"=>$data, "title"=>$title));
   }
   elseif($_format=='json'){
   	return $this->render('T43/format.json.twig', Array("data"=>$data, "title"=>$title));
   }
}
public function numberAction($number)
{
	$title="PaginaNumero T43";
	return $this->render('T43/number.html.twig', Array("number"=>$number,"title"=>$title));
}
public function textAction($text)
{
	$title="PaginaTexto T43";
	return $this->render('T43/text.html.twig', Array("text"=>$text,"title"=>$title));
}
public function defaultAction($page)
{
	$title="Pagina por defecto: 1";
	return $this->render('T43/default.html.twig', Array("page"=>$page,"title"=>$title));
}
}
