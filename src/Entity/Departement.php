<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="departement")
     */
    private $nameofdep;

    /**
     * @ORM\Column(type="string", length=255, name="esprit")
     */
    private $location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameofdep(): ?string
    {
        return $this->nameofdep;
    }

    public function setNameofdep(string $nameofdep): self
    {
        $this->nameofdep = $nameofdep;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }
}
