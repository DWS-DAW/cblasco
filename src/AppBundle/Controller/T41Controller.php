<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class T41Controller extends Controller
{
   
 
    /**
     * @Route("/magic/number", name="magicnumber")
     */
    function magicNumberAction()
    {
    	$n=rand(0,10);
   	return new Response('<html><body>El numero mágico generado es '.$n.'</body></html>');
}
/**
 * @Route("/dow/{dow}", name="dow")
 */
public function dayofweekAction($dow)
{
	$dias= Array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
	return new Response('<html><body>El dia seleccionado es '.$dias{$dow}.'</body></html>');
}
/**
 * @Route("/table/{number}", name="number")
 */
public function tableAction($number)
{
echo "<html><body><table border=1><tr><th>Tabla de multiplicar del $number</th></tr>";
	for($m=0;$m<11;$m++){
		$r=$m*$number;
		echo "<tr><td> $number por $m es igual a $r</tr></td>";
	}
echo "</table></body></html>";
	return new Response();
}
/**
 * @Route("/Hello/{lang}", name="lang")
 */
public function HelloAction($lang)
{
	switch ($lang) {
    case "es":
        echo "Bienvenido a mi web";
        break;
    case "en":
        echo "Welcome to my web translated into your language";
        break;
    case "fr":
        echo "Bienvenue sur mon site web traduit dans votre langue";
        break;
    case "ger":
       	echo "Willkommen auf meiner Webseite in Ihre Sprache übersetzt";
     	break;
    case "rus":
        echo "Добро пожаловать в мой веб переведены на ваш язык";
        break;
    default:
    	echo "Especifique un idioma para acceder a la página";
    	break;
}
	return new Response();
}
}