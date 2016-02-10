<?php
// src/AppBundle/Entity/Carrera.php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;
/**
	 * @ORM\Entity
	 * @ORM\Table(name="carrera")
	 */
class Carrera{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $nombre;
    /**
     * @ORM\Column(type="integer", scale=2)
     */
    protected $distancia;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $localidad;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $tipo;
	/**
	 * @ORM\Column(type="string")
	 */
	protected $fecha;
	/**
	 * @ORM\Column(type="integer", scale=2)
	 */
	protected $precio;
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $web;
	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $descripcion;
	/**
	 * @ORM\ManyToOne(targetEntity="Circuit", inversedBy="carreras", cascade={"persist"})
	 * @ORM\JoinColumn(name="circuit_id", referencedColumnName="id", nullable=true)
	 */
	protected $circuito;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Carreras
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     *
     * @return Carreras
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Carreras
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fecha
     *
     * @param integer $fecha
     *
     * @return Carreras
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return integer
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     *
     * @return Carreras
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set web
     *
     * @param string $web
     *
     * @return Carreras
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Carreras
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set circuito
     *
     * @param \AppBundle\Entity\Circuit $circuito
     *
     * @return Carreras
     */
    public function setCircuito(\AppBundle\Entity\Circuit $circuito)
    {
        $this->circuito = $circuito;

        return $this;
    }

    /**
     * Get circuito
     *
     * @return \AppBundle\Entity\Circuit
     */
    public function getCircuito()
    {
        return $this->circuito;
    }

    /**
     * Set distancia
     *
     * @param integer $distancia
     *
     * @return Carrera
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Get distancia
     *
     * @return integer
     */
    public function getDistancia()
    {
        return $this->distancia;
    }
}
