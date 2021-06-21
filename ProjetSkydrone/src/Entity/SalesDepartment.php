<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalesDepartment
 *
 * @ORM\Table(name="Sales_department", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class SalesDepartment
{
    /**
     * @var int
     *
     * @ORM\Column(name="sd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sdId;

    /**
     * @return int
     */
    public function getSdId(): int
    {
        return $this->sdId;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=150, nullable=false)
     */
    private $adress;

    /**
     * @return string
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     */
    public function setAdress(string $adress): self
    {
        $this->adress = $adress;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=50, nullable=false)
     */
    private $zipCode;

    /**
     * @return string
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): self
    {
        $this->city = $city;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @return DateTime
     */
    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param DateTime|null $birthdate
     * @return SalesDepartment
     */
    public function setBirthdate(?DateTime $birthdate): self
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=50, nullable=false)
     */
    private $phoneNumber;

    /**
     * @return string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
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


    public function getUser(): ?Users
    {
        return $this->user;
    }


    /**
     * @param Users|null $user
     */
    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }


}
