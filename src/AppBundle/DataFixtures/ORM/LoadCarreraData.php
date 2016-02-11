<?php 
// src/AppBundle/DataFixtures/ORM/LoadCarreraData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Circuit;
use AppBundle\Entity\Carrera;

class LoadCarreraData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		
		$this->container = $container;
		
		
	}
	public function load(ObjectManager $manager)
	{

		
		$symfony_app_base_dir = $this->container->getParameter('kernel.root_dir');
		$fd = fopen($symfony_app_base_dir . '/Resources/data/carreras.csv', "r");
		$row = 0;
		if ($fd) {
			while (($data = fgetcsv($fd)) !== false) {
            $row++;
            if ($row == 1) continue; //skip header
				$carrera = new Carrera();	
				$carrera->setNombre($data[0]);
				$carrera->setDistancia($data[1]);
				$carrera->setLocalidad($data[2]);
				$carrera->setTipo($data[3]);
				$carrera->setFecha($data[4]);
				$carrera->setPrecio($data[5]);
				$carrera->setWeb($data[6]);
				$carrera->setDescripcion($data[7]);
				$carrera->setCircuito($this->getReference($data[8]));
				$this->addReference($data[0], $carrera);
				$manager->persist($carrera);		
			}

		$manager->flush();		
		fclose($fd);
		}	
    } 
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
} 
