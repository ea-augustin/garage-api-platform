<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
#[ApiResource]
class Address
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
    private $street_num_add;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postal_code_add;

    /**
     * @ORM\OneToMany(targetEntity=Garage::class, mappedBy="address")
     */
    private $garages;

    /**
     * @ORM\ManyToOne(targetEntity=city::class, inversedBy="addresses")
     */
    private $city;

    public function __construct()
    {
        $this->garages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreetNumAdd(): ?string
    {
        return $this->street_num_add;
    }

    public function setStreetNumAdd(string $street_num_add): self
    {
        $this->street_num_add = $street_num_add;

        return $this;
    }

    public function getPostalCodeAdd(): ?string
    {
        return $this->postal_code_add;
    }

    public function setPostalCodeAdd(string $postal_code_add): self
    {
        $this->postal_code_add = $postal_code_add;

        return $this;
    }

    /**
     * @return Collection|Garage[]
     */
    public function getGarages(): Collection
    {
        return $this->garages;
    }

    public function addGarage(Garage $garage): self
    {
        if (!$this->garages->contains($garage)) {
            $this->garages[] = $garage;
            $garage->setAddress($this);
        }

        return $this;
    }

    public function removeGarage(Garage $garage): self
    {
        if ($this->garages->removeElement($garage)) {
            // set the owning side to null (unless already changed)
            if ($garage->getAddress() === $this) {
                $garage->setAddress(null);
            }
        }

        return $this;
    }

    public function getCity(): ?city
    {
        return $this->city;
    }

    public function setCity(?city $city): self
    {
        $this->city = $city;

        return $this;
    }
}
