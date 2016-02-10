<?php 
// src/AppBundle/DataFixtures/ORM/LoadCircuitData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Circuit;

class LoadCircuitData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		
		$this->container = $container;
		
		
	}
	public function load(ObjectManager $manager)
	{

		
		$symfony_app_base_dir = $this->container->getParameter('kernel.root_dir');
		$fd = fopen('app/Resources/data/circuits.csv', "r");
		$row = 0;
		if ($fd) {
			while (($data = fgetcsv($fd)) !== false) {
            $row++;
            if ($row == 1) continue; //skip header
				$circuit = new Circuit();	
				$circuit->setName($data[0]);
				$circuit->setCarreras($data[1]);
				$manager->persist($circuit);
			
//$category = $this->getDoctrine ()->getRepository ( 'AppBundle:Category' )->find ( 1 );
		
			}


		$manager->flush();
		$this->addReference('circuit', $circuit);
		fclose($fd);
		}
    } 
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
} 
