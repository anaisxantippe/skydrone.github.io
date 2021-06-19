<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suppliers
 *
 * @ORM\Table(name="suppliers", indexes={@ORM\Index(name="rd_id", columns={"rd_id"})})
 * @ORM\Entity
 */
class Suppliers
{
    /**
     * @var int
     *
     * @ORM\Column(name="suppliers_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $suppliersId;
    /**
     *
     */
    /**
     * @return int
     */
    public function getSuppliersId(): int
    {
        return $this->suppliersId;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=50, nullable=false)
     */
    private $companyName;

    /**
     * @return string
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName):self
    {
        $this->companyName = $companyName;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=false)
     */
    private $mail;

    /**
     * @return string
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;
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
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=100, nullable=false)
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
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=50, nullable=false)
     */
    private $siret;

    /**
     * @return string
     */
    public function getSiret(): ?string
    {
        return $this->siret;
    }

    /**
     * @param string $siret
     */
    public function setSiret(string $siret): self
    {
        $this->siret = $siret;
    }

    /**
     * @var \ResourceDepartment
     *
     * @ORM\ManyToOne(targetEntity="ResourceDepartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rd_id", referencedColumnName="rd_id")
     * })
     */
    private $rd;

    /**
     * @return ResourceDepartment|null
     */
    public function getRd(): ?ResourceDepartment
    {
        return $this->rd;
    }

    /**
     * @param ResourceDepartment|null $rd
     */
    public function setRd(?ResourceDepartment $rd): self
    {
        $this->rd = $rd;
    }

}
