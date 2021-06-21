<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bill
 *
 * @ORM\Table(name="Bill", indexes={@ORM\Index(name="order_id", columns={"order_id"})})
 * @ORM\Entity
 */
class Bill
{
    /**
     * @var int
     *
     * @ORM\Column(name="bill_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $billId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bill_date", type="date", nullable=false)
     */
    private $billDate;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="order_id")
     * })
     */
    private $order;

    public function getBillId(): ?int
    {
        return $this->billId;
    }

    public function getBillDate(): ?\DateTimeInterface
    {
        return $this->billDate;
    }

    public function setBillDate(\DateTimeInterface $billDate): self
    {
        $this->billDate = $billDate;

        return $this;
    }

    public function getOrder(): ?Orders
    {
        return $this->order;
    }

    public function setOrder(?Orders $order): self
    {
        $this->order = $order;

        return $this;
    }


}
