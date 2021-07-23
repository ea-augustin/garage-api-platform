<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GarageRepository::class)
 */
#[ApiResource]
class Garage
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
    private $name_gar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_gar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone_gar;

    /**
     * @ORM\OneToMany(targetEntity=Advertisement::class, mappedBy="garage", orphanRemoval=true)
     */
    private $advertisements;

    /**
     * @ORM\ManyToOne(targetEntity=Professional::class, inversedBy="garage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $professional;

    /**
     * @ORM\ManyToOne(targetEntity=address::class, inversedBy="garages")
     */
    private $address;

    public function __construct()
    {
        $this->advertisements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameGar(): ?string
    {
        return $this->name_gar;
    }

    public function setNameGar(string $name_gar): self
    {
        $this->name_gar = $name_gar;

        return $this;
    }

    public function getEmailGar(): ?string
    {
        return $this->email_gar;
    }

    public function setEmailGar(string $email_gar): self
    {
        $this->email_gar = $email_gar;

        return $this;
    }

    public function getTelephoneGar(): ?string
    {
        return $this->telephone_gar;
    }

    public function setTelephoneGar(string $telephone_gar): self
    {
        $this->telephone_gar = $telephone_gar;

        return $this;
    }

    /**
     * @return Collection|Advertisement[]
     */
    public function getAdvertisements(): Collection
    {
        return $this->advertisements;
    }

    public function addAdvertisement(Advertisement $advertisement): self
    {
        if (!$this->advertisements->contains($advertisement)) {
            $this->advertisements[] = $advertisement;
            $advertisement->setGarage($this);
        }

        return $this;
    }

    public function removeAdvertisement(Advertisement $advertisement): self
    {
        if ($this->advertisements->removeElement($advertisement)) {
            // set the owning side to null (unless already changed)
            if ($advertisement->getGarage() === $this) {
                $advertisement->setGarage(null);
            }
        }

        return $this;
    }

    public function getProfessional(): ?Professional
    {
        return $this->professional;
    }

    public function setProfessional(?Professional $professional): self
    {
        $this->professional = $professional;

        return $this;
    }

    public function getAddress(): ?address
    {
        return $this->address;
    }

    public function setAddress(?address $address): self
    {
        $this->address = $address;

        return $this;
    }
}
