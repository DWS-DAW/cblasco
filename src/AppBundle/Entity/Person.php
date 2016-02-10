<?php
// src/AppBundle/Entity/Person.php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;
/**
	 * @ORM\Entity
	 * @ORM\Table(name="person")
	 */
class Person{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	Protected $id;
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	Protected $name;
	/**
	 * @ORM\Column(type="integer", nullable=true)
	 * @Assert\Range(
     *      min = 18,
     *      max = 90,
     *      minMessage = "No puedes registrarte siendo menor de edad",
     *      maxMessage = "Los años introducidos no pueden ser mas de {{ limit }}"
     * )
	 */
	Protected $age;
	/**
	 * @ORM\Column(type="date")
	 */
	protected $birthDate;
	/**
	 * @ORM\Column(type="integer", nullable=true)
	 * @Assert\Range(
     *      min = 100,
     *      max = 300,
     *      minMessage = "No puedes introducir una altura inferior a {{ limit }}cm",
     *      maxMessage = "No puedes introducir una altura superior a {{ limit }}cm"
     * )
	 */
	protected $height;
	/**
	 * @ORM\Column(type="string", length=100)
	 * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
	 */
	Protected $email;
	/**
	 * @ORM\Column(type="integer")
	 * @Assert\Length(min=9, max=12)
	 */
	Protected $phone;
	/**
	 * @ORM\Column(type="string", length=10)
	 *  @Assert\Choice({"m", "f"}),
	 *  message = "Choose a valid gender.")
	 */
	protected $gender;
	/**
	 * @ORM\Column(type="integer", nullable=true)
	 * @Assert\Range(
     *      min = 0,
     *      max = 20,
     *      minMessage = "Es imposible tener menos de {{ limit }} descendientes",
     *      maxMessage = "Enhorabuena campeón!!, pero aquí no puedes acceder"
     * )
	 */
	protected $descends;
	/**
	 * @ORM\Column(type="integer")
	 */
	Protected $vehicle;
	/**
	 * @ORM\Column(type="string", length=100)
	 * @Assert\Language(
	 * message="No es un lenguaje valido"
	 * )
	 */
	Protected $preferredLanguaje;
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $englishLevel;
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 * @Assert\Url(
	 * message="Debes escribir la url completa"
	 * )
	 */
	Protected $personalWebSite;
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 * @Assert\CardScheme(
	 * schemes={"VISA","MASTERCARD","MAESTRO"},
	 * message="Némero de targeta de credito/debito invalido")
	 */
	Protected $cardNumber;
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 * @Assert\Iban(
	 * message="Debes de poner un número de cuenta internacional")
	 * 
	 */
	protected $IBAN;
	
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
     * @return Person
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
     * Set age
     *
     * @param integer $age
     *
     * @return Person
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Person
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Person
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Person
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set descends
     *
     * @param integer $descends
     *
     * @return Person
     */
    public function setDescends($descends)
    {
        $this->descends = $descends;

        return $this;
    }

    /**
     * Get descends
     *
     * @return integer
     */
    public function getDescends()
    {
        return $this->descends;
    }

    /**
     * Set vehicle
     *
     * @param integer $vehicle
     *
     * @return Person
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Get vehicle
     *
     * @return integer
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Set preferredLanguaje
     *
     * @param string $preferredLanguaje
     *
     * @return Person
     */
    public function setPreferredLanguaje($preferredLanguaje)
    {
        $this->preferredLanguaje = $preferredLanguaje;

        return $this;
    }

    /**
     * Get preferredLanguaje
     *
     * @return string
     */
    public function getPreferredLanguaje()
    {
        return $this->preferredLanguaje;
    }

    /**
     * Set englishLevel
     *
     * @param integer $englishLevel
     *
     * @return Person
     */
    public function setEnglishLevel($englishLevel)
    {
        $this->englishLevel = $englishLevel;

        return $this;
    }

    /**
     * Get englishLevel
     *
     * @return integer
     */
    public function getEnglishLevel()
    {
        return $this->englishLevel;
    }

    /**
     * Set personalWebSite
     *
     * @param string $personalWebSite
     *
     * @return Person
     */
    public function setPersonalWebSite($personalWebSite)
    {
        $this->personalWebSite = $personalWebSite;

        return $this;
    }

    /**
     * Get personalWebSite
     *
     * @return string
     */
    public function getPersonalWebSite()
    {
        return $this->personalWebSite;
    }

    /**
     * Set cardNumber
     *
     * @param string $cardNumber
     *
     * @return Person
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set iBAN
     *
     * @param string $iBAN
     *
     * @return Person
     */
    public function setIBAN($iBAN)
    {
        $this->IBAN = $iBAN;

        return $this;
    }

    /**
     * Get iBAN
     *
     * @return string
     */
    public function getIBAN()
    {
        return $this->IBAN;
    }
}
