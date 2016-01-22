<?php 
// src/AppBundle/DataFixtures/ORM/LoadProductData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Category;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		
		$this->container = $container;
		
		$symfony_app_base_dir = $this->container->getParameter('kernel.root_dir');
	
		$row=0;
		if (($fp = fopen("app/Resources/data/products.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
				$row++;
				if ($row == 1) continue; //skip header
				printf("Nombre: %s",$data[0]);
				printf("Desc: %s",$data[1]);
				printf("Categoría: %s",$data[2]);
				printf("Precio: %s",$data[3]);
			}
			fclose($fp);
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
    public function getOrder()
    {
    	// the order in which fixtures will be loaded
    	// the lower the number, the sooner that this fixture is loaded
    	return 2;
    }
} 