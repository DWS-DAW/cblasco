<?php
// src/AppBundle/Entity/Position.php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;
/**
	 * @ORM\Entity
	 * @ORM\Table(name="position")
	 */
class Position{
    /**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $tiempo;
	/**
     * @ORM\Column(type="string", length=100)
	 */
	protected $corredor;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Carrera", inversedBy="positions", cascade={"persist"})
	 * @ORM\JoinColumn(name="carrera_id", referencedColumnName="id", nullable=false)
	 */
	protected $carrera;  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->corredor = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set tiempo
     *
     * @param \DateTime $tiempo
     *
     * @return Position
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Get tiempo
     *
     * @return \DateTime
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Add corredor
     *
     * @param \AppBundle\Entity\Corredor $corredor
     *
     * @return Position
     */
    public function addCorredor(\AppBundle\Entity\Corredor $corredor)
    {
        $this->corredor[] = $corredor;

        return $this;
    }

    /**
     * Remove corredor
     *
     * @param \AppBundle\Entity\Corredor $corredor
     */
    public function removeCorredor(\AppBundle\Entity\Corredor $corredor)
    {
        $this->corredor->removeElement($corredor);
    }

    /**
     * Get corredor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorredor()
    {
        return $this->corredor;
    }

    /**
     * Set carrera
     *
     * @param \AppBundle\Entity\Carrera $carrera
     *
     * @return Position
     */
    public function setCarrera(\AppBundle\Entity\Carrera $carrera)
    {
        $this->carrera = $carrera;

        return $this;
    }

    /**
     * Get carrera
     *
     * @return \AppBundle\Entity\Carrera
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    /**
     * Set corredor
     *
     * @param string $corredor
     *
     * @return Position
     */
    public function setCorredor($corredor)
    {
        $this->corredor = $corredor;

        return $this;
    }
}
