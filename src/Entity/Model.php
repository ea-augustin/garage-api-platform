<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
#[ApiResource]
class Model
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
    private $name_mod;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="model")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\OneToOne(targetEntity=Images::class, cascade={"persist", "remove"})
     */
    private $logo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMod(): ?string
    {
        return $this->name_mod;
    }

    public function setNameMod(string $name_mod): self
    {
        $this->name_mod = $name_mod;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getLogo(): ?images
    {
        return $this->logo;
    }

    public function setLogo(?images $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
}
