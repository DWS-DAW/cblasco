<?php 
// src/AppBundle/Entity/Circuit.php 
 

 
namespace AppBundle\Entity; 
 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/** 
 * Category 
 * 
 * @ORM\Table() 
 * @ORM\Entity 
 */ 
class Circuit 
{ 
     /**
     * @var integer
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
private $id; 
 
     /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length=255)
     */ 
private $name; 
 /**
     * @var string
     * 
     * @ORM\Column(name="carreras", type="integer")
     */ 
private $carreras; 
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Circuit
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set carreras
     *
     * @param integer $carreras
     *
     * @return Circuit
     */
    public function setCarreras($carreras)
    {
        $this->carreras = $carreras;

        return $this;
    }

    /**
     * Get carreras
     *
     * @return integer
     */
    public function getCarreras()
    {
        return $this->carreras;
    }

    
}
