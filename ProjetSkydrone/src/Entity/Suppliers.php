<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suppliers
 *
 * @ORM\Table(name="Suppliers", indexes={@ORM\Index(name="rd_id", columns={"rd_id"})})
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
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=50, nullable=false)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=50, nullable=false)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=100, nullable=false)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=50, nullable=false)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=50, nullable=false)
     */
    private $siret;

    /**
     * @var \ResourceDepartment
     *
     * @ORM\ManyToOne(targetEntity="ResourceDepartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rd_id", referencedColumnName="rd_id")
     * })
     */
    private $rd;


}
