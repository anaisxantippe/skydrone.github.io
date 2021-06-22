<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="product_id", columns={"product_id"}), @ORM\Index(name="customer_id", columns={"customer_id"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->orderId;
    }


    /**
     * @var \DateTime
     *
     *
     * @ORM\Column(name="order_date", type="date", nullable=false)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner une date"
     * )
     */

    private $orderDate;
    /**
     * @return mixed
     */
    public

    function getorderDate(): ?datetime
    {
        return $this->orderDate;
    }

    public

    function setorderDate (datetime $orderDate): self
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @var bool
     *
     * @ORM\Column(name="delayed_payment", type="boolean", nullable=false)
     *
     */
    private $delayedPayment;

    /**
     * @return mixed
     */
    public
    function getDelayedPayment(): ?bool
    {
        return $this->delayedPayment;
    }

    public
    function setdelayedPayment(bool $delayedPayment): self
    {
        $this->delayedPayment = $delayedPayment;
        return $this;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="df_total", type="integer", nullable=false)
     * @Assert\NotBlank(
     *     message="Veuillez entrer un total hors taxe "
     * )
     * @Assert\Regex(
     *     pattern="^\d+(,\d{3})*(\.\d{1,2})?$",
     *     message="Caratère(s) non valide(s)"
     * )
     */
    private $dfTotal;

    /**
     * @return mixed
     */
    public
    function getDfTotal(): ?int
    {
        return $this->dfTotal;
    }

    public
    function setDftotal(int $dftotal): self
    {
        $this->dfTotal = $dftotal;
        return $this;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     * @Assert\NotBlank (
     *     message="Veuillez entrer une quantité "
     * )
     * @Assert\Regex (
     *     pattern="^0$|^[1-9][0-9]*$",
     *     message="Caratère(s) non valide(s)"
     * )
     */
    private $quantity;
    /**
     * @return mixed
     */
    public
    function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public
    function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @var bool
     *
     * @ORM\Column(name="payed", type="boolean", nullable=false)
     */
    private $payed;

    /**
     * @return mixed
     */
    public
    function getPayed(): ?bool
    {
        return $this->payed;
    }

    public
    function setPayed(bool $payed): self
    {
        $this->payed = $payed;
        return $this;
    }


    /**
     * @var int|null
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     * @Assert\Regex(
     *     pattern="^\d+(,\d{3})*(\.\d{1,2})?$",
     *     message="Caratère(s) non valide(s)"
     * )
     */



    private $discount;

    /**
     * @return int|null
     */
    public
    function getDiscount(): ?int
    {
        return $this->discount;
    }

    public
    function setDiscount(int $discount): self
    {
        $this->discount = $discount;
        return $this;
    }
    /**
    private $discount;


    /**
     * @var int
     *
     * @ORM\Column(name="total", type="integer", nullable=false)
     * @Assert\NotBlank (
     *     message="Veuillez entrer un total TTC"
     * )
     * @Assert\Regex(
     *     pattern="^\d+(,\d{3})*(\.\d{1,2})?$",
     *     message="Caratère(s) non valide(s)"
     * )
     */
    private $total;
    public
    function getTotal(): ?int
    {
        return $this->total;
    }

    public
    function setTotal(int $total): self
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @Assert\NotBlank(
     *     message="Veuillez choisir un client  "
     * )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customer;


    public
    function getCustomer(): ?string
    {
        return $this->customer;
    }

    public
    function setCustomer(string $customer): self
    {
        $this->customer = $customer;
        return $this;
    }
    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     *  @Assert\NotBlank(
     *     message="Veuillez choisir un produit "
     * )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product;


    public
    function getProduct(): ?string
    {
        return $this->product;
    }

    public
    function setProduct(string $product): self
    {
        $this->product = $product;
        return $this;
    }


}
