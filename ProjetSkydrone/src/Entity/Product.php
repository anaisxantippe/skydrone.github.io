<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="Product", indexes={@ORM\Index(name="suppliers_id", columns={"suppliers_id"})})
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

    private ?int $productId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=50, nullable=false)
     * @Assert\Length(min=5, max=50, minMessage="Le nom doit comporter au moins 5 caractères !", maxMessage="Le nom doit comporter au plus 50 caractères !")
     *  @Assert\Regex(
     *     pattern="/([A-Zéèêëùüàäâïî0-9_-])/",
     *     match=true,
     *     message="Les seuls caractères spéciaux acceptés sont '-' et '_' !"
     * )
     */
    private string $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     * @Assert\Length(min=10, max=65535, minMessage="La description doit comporter au moins 10 caractères !")
     * @Assert\Regex(
     *     pattern="/([A-Za-zéèêëùüàäâïî0-9_.,!-?])/",
     *     match=true,
     *     message="Les seuls caractères spéciaux acceptés sont '-', '_', '?', '!', '.' et ',' !"
     * )
     */
    private string $description;

    /**
     * @var int
     *
     * @ORM\Column(name="df_price", type="integer", nullable=false)
     * @Assert\Length(min=2, max=11, minMessage="Le prix doit être composé d'au moins 2 chiffres !", maxMessage="Le prix ne doit pas faire plus de 11 chiffres !")
     * @Assert\Regex(
     *     pattern="/([0-9.])/",
     *     match=true,
     *     message="Vous ne pouvez utiliser que des chiffres et un '.' !"
     * )
     */
    private int $dfPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=250, nullable=false)
     * @Assert\Length(min=5, max=255, minMessage="Le nom du fichier doit comporter au moins 5 caractères !", maxMessage="Vous ne pouvez pas télécharger un fichier dont le nom fait plus de 255 caractères !")
     * @Assert\Regex(
     *     pattern="/([A-Za-zéèêëùüàäâïî0-9_-])/",
     *     match=true,
     *     message="Les seuls caractères spéciaux acceptés sont '-' et '_' !"
     * )
     */
    private string $picture;

    /**
     * @var \Suppliers
     *
     * @ORM\ManyToOne(targetEntity="Suppliers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suppliers_id", referencedColumnName="suppliers_id")
     * })
     * @Assert\Length(min=1, max=11, minMessage="L'identifiant du fournisseur doit comporter au moins 1 chiffre !", maxMessage="L'identifiant du fournisseur ne peut pas comporter plus de 11 chiffres !")
     * @Assert\Regex(
     *     pattern="/([0-9])/",
     *     match=true,
     *     message="Vous ne pouvez utiliser que des chiffres !"
     * )
     */
    private $suppliers;

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDfPrice(): ?int
    {
        return $this->dfPrice;
    }

    public function setDfPrice(int $dfPrice): self
    {
        $this->dfPrice = $dfPrice;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSuppliers(): ?Suppliers
    {
        return $this->suppliers;
    }

    public function setSuppliers(?Suppliers $suppliers): self
    {
        $this->suppliers = $suppliers;

        return $this;
    }
public function __toString()
{
    return $this->productName;
}
}
