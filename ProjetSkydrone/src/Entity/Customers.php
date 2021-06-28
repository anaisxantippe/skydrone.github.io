<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="sd_id", columns={"sd_id"})})
 * @ORM\Entity
 */
class Customers
{
    /**
     * @var int
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company", type="string", length=50, nullable=true)
     */
    private $company;

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
     * @ORM\Column(name="delivery_adress", type="string", length=100, nullable=false)
     */
    private $deliveryAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_zip", type="string", length=50, nullable=false)
     */
    private $deliveryZip;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_city", type="string", length=60, nullable=false)
     */
    private $deliveryCity;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_country", type="string", length=50, nullable=false)
     */
    private $deliveryCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_adress", type="string", length=100, nullable=false)
     */
    private $billingAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_city", type="string", length=50, nullable=false)
     */
    private $billingCity;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_zip", type="string", length=50, nullable=false)
     */
    private $billingZip;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_country", type="string", length=50, nullable=false)
     */
    private $billingCountry;

    /**
     * @var int
     *
     * @ORM\Column(name="vat", type="integer", nullable=false)
     */
    private $vat;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=50, nullable=false)
     */
    private $phoneNumber;

    /**
     * @var \SalesDepartment
     *
     * @ORM\ManyToOne(targetEntity="SalesDepartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sd_id", referencedColumnName="sd_id")
     * })
     */
    private $sd;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    public function __toString()
    {
        return $this->lastname;
        // TODO: Implement __toString() method.
    }


}
