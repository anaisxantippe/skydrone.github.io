<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalesDepartment
 *
 * @ORM\Table(name="sales_department", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
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
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=150, nullable=false)
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
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=50, nullable=false)
     */
    private $phoneNumber;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;


}
