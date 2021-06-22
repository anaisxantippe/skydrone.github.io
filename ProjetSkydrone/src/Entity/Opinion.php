<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Opinion
 *
 * @ORM\Table(name="opinion", indexes={@ORM\Index(name="customer_id", columns={"customer_id"}), @ORM\Index(name="product_id", columns={"product_id"})})
 * @ORM\Entity
 */
class Opinion
{
    /**
     * @var int
     *
     * @ORM\Column(name="opinion_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $opinionId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     * @Assert\Length(min=3, max=10, minMessage="Le titre doit comporter au moins 3 caractères ")
     * @Assert\Regex (
     *    pattern="/([A-Za-zéèêëùüàäâïî0-9.,!-?])/",
     *     match=true,
     *    message="Caractère(s) non valide(s)"
     * )
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     * @Assert\Regex (
     *     pattern="/([A-Za-zéèêëùüàäâïî0-9.,!-?%])/",
     *     message="Caractère(s) non valide(s)"
     * )
     */
    public $description;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    public $product;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    public $customer;

    public function getOpinionId(): ?int
    {
        return $this->opinionId;
    }


}
