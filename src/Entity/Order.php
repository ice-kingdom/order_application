<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $order_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $order_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $order_wording;

    /**
     * @ORM\Column(type="integer")
     */
    private $student_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderNumber(): ?string
    {
        return $this->order_number;
    }

    public function setOrderNumber(string $order_number): self
    {
        $this->order_number = $order_number;

        return $this;
    }

    public function getOrderDate(): ?string
    {
        return $this->order_date;
    }

    public function setOrderDate(string $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getOrderWording(): ?string
    {
        return $this->order_wording;
    }

    public function setOrderWording(string $order_wording): self
    {
        $this->order_wording = $order_wording;

        return $this;
    }

    public function getStudentId(): ?int
    {
        return $this->student_id;
    }

    public function setStudentId(int $student_id): self
    {
        $this->student_id = $student_id;

        return $this;
    }
}
