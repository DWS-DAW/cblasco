<?php 
// src/AppBundle/DataFixtures/ORM/LoadCategoryData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Category;

class LoadCategoryData implements FixtureInterface, ContainerAwareInterface
{
	
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		
		$this->container = $container;
		
		$symfony_app_base_dir = $this->container->getParameter('kernel.root_dir');
		
		
		$fd = fopen('categories.csv', "r");
		if ($fd) {
			while (($data = fgetcsv($fd)) !== false) {
		
				printf("nombre categoría",$data[0]);
			}
		
			fclose($fd);
		}
	}
	
	public function load(ObjectManager $manager)
	{
		/*$category1= new Category();
		$category1->setName('Carnes');
	$category2 = new Category();
		$category2->setName('Pescados');
		$category3 = new Category(); 
      $category3->setName('Ultracongelados'); 
        $category4 =new Category(); 
        $category4->setName('Limpieza'); 
 
        $manager->persist($category1); 
        $manager->persist($category2); 
        $manager->persist($category3); 
        $manager->persist($category4); 
        $manager->flush();*/
    } 
} 