<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class T44Controller extends Controller
{
	public function staticAction($name){
		$title="Se esta usando la plantilla ".$name.".html.twig";
   	return $this->render('T44/'.$name.'.html.twig', Array("name"=>$name,"title"=>$title));
	}

}
