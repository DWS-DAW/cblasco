<?php
namespace AppBundle\Entity;
class Carrera
{
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
	 * @ORM\Column(type="string", length=100)
	 */
	protected $localidad;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $tipo;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $fecha;/**
	 * @ORM\Column(type="integer", scale=2)
	 */
	protected $precio;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $web;
	/**
	 * @ORM\Column(type="text")
	 */
	protected $description;
}