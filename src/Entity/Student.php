<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
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
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $group_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $course;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getGroupNumber(): ?string
    {
        return $this->group_number;
    }

    public function setGroupNumber(string $group_number): self
    {
        $this->group_number = $group_number;

        return $this;
    }

    public function getCourse(): ?int
    {
        return $this->course;
    }

    public function setCourse(int $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getGroupNumberInEnglish($groupNumber){
        $groups = [
            'MT-101' => 'MT-101',
            'MT-102' => 'MT-102',
            'MP-101' => 'MП-101',
            'MP-102' => 'MП-102',
            'MN-101' => 'MН-101',
            'MN-102' => 'MН-102',
            'MK-101' => 'MК-101',
            'MK-102' => 'MК-102',
        ];
        return array_search($groupNumber, $groups);
    }
}
