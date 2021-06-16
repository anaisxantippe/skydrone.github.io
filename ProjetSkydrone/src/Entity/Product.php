<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="suppliers_id", columns={"suppliers_id"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=50, nullable=false)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="df_price", type="integer", nullable=false)
     */
    private $dfPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=250, nullable=false)
     */
    private $picture;

    /**
     * @var \Suppliers
     *
     * @ORM\ManyToOne(targetEntity="Suppliers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suppliers_id", referencedColumnName="suppliers_id")
     * })
     */
    private $suppliers;


}
