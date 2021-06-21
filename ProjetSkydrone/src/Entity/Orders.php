<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Orders
 *
 * @ORM\Table(name="Orders", indexes={@ORM\Index(name="customer_id", columns={"customer_id"}), @ORM\Index(name="product_id", columns={"product_id"})})
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
     * @var \DateTime
     *
     */
    private $orderDate;
    }

    /**
     * @var bool
     *
     * @ORM\Column(name="delayed_payment", type="boolean", nullable=false)
     */
    private $delayedPayment;


     * @var DateTime
     *
     * @ORM\Column(name="order_date", type="date", nullable=false)
     * @Assert\NotBlank(
     *     message="Veuillez renseigner une date"
     * )
    /**
     * @var int
     *
     * @ORM\Column(name="df_total", type="integer", nullable=false)
     */
    private $dfTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
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


    private $orderDate;


    /**
     * @var bool
     *
     * @ORM\Column(name="delayed_payment", type="boolean", nullable=false)
     *
     */
    private $delayedPayment;

    /**
     * @var int
     *
     * @ORM\Column(name="df_total", type="integer", nullable=false)
     */
    private $dfTotal;

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
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var bool
     *
     * @ORM\Column(name="payed", type="boolean", nullable=false)
     */
    private $payed;

    /**
     * @var int|null
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

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
     * @ORM\Column(name="total", type="integer", nullable=false)
     */
    private $total;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customer;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product;

    private $quantity;

    /**
     * @var bool
     *
     * @ORM\Column(name="payed", type="boolean", nullable=false)
     */
    private $payed;

    /**
     * @var int|null
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

    /**
     * @var int
     *
     * @ORM\Column(name="total", type="integer", nullable=false)
     */
    private $total;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customer;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product;

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getDelayedPayment(): ?bool
    {
        return $this->delayedPayment;
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
    public function setDelayedPayment(bool $delayedPayment): self
    {
        $this->delayedPayment = $delayedPayment;

        return $this;
    }

    public function getDfTotal(): ?int
    {
        return $this->dfTotal;
    }

    public function setDfTotal(int $dfTotal): self
    {
        $this->dfTotal = $dfTotal;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPayed(): ?bool
    {
        return $this->payed;
    }

    public function setPayed(bool $payed): self
    {
        $this->payed = $payed;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }


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


    public function getTotal(): ?int

    {
        return $this->total;
    }

    public function setTotal(int $total): self
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

    public function getCustomer(): ?Customers
    {
        return $this->customer;
    }

    public function setCustomer(?Customers $customer): self
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }


}
