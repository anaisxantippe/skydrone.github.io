<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;
use DateTime;

/**
 * ResourceDepartment
 *
 * @ORM\Table(name="resource_department", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class ResourceDepartment
{
    /**
     * @var int
     *
     * @ORM\Column(name="rd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rdId;


    /**
     * @return mixed
     */
    public function getrdId(): ?int
    {
        return $this->rdId;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @return string|null
     */
    public
    function getlastname(): ?string
    {
        return $this->lastname;
    }

    public
    function setlastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @return string|null
     */
    public
    function getfirstname(): ?string
    {
        return $this->firstname;
    }

    public
    function setfirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=150, nullable=false)
     */
    private $adress;

     /**
     * @return string|null
     */
    public
    function getadress(): ?string
    {
        return $this->adress;
    }

    public
    function setadress(string $adress): self
    {
        $this->adress = $adress;
        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=50, nullable=false)
     */
    private $zipCode;

    /**
     * @return string|null
     */
    public
    function getzipcode(): ?string
    {
        return $this->zipCode;
    }

    public
    function setzipcode(string $zipcode): self
    {
        $this->zipCode = $zipcode;
        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @return string|null
     */
    public
    function getcity(): ?string
    {
        return $this->city;
    }

    public
    function setcity(string $city): self
    {
        $this->city = $city;
        return $this;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @return datetime|null
     */
    public
    function getbirthdate(): ?datetime
    {
        return $this->birthdate;
    }

    public
    function setbirthday(datetime $birthdate): self
    {
        $this->birthdate = $birthdate;
        return $this;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=50, nullable=false)
     */
    private $phoneNumber;

    /**
     * @return string|null
     */
    public
    function getphonenumber(): ?string
    {
        return $this->phoneNumber;
    }

    public
    function setphonenumber(string $phonenumber): self
    {
        $this->phoneNumber = $phonenumber;
        return $this;
    }
    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @return Users|null
     */
    public function getuser(): ?Users
    {
        return $this->user;
    }
    /**
     * @return Users
     */

    /**
     * @param \Users $user
     */
    public function setUser(\Users $user): self
    {
        $this->user = $user;
        return $this;
    }



}
