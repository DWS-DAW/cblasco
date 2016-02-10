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
     * @param string $tiempo
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
     * @return string
     */
    public function getTiempo()
    {
        return $this->tiempo;
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

    /**
     * Get corredor
     *
     * @return string
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
}
