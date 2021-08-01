<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertisementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AdvertisementRepository::class)
 */
#[ApiResource (normalizationContext: ['groups' =>['car']])]
class Advertisement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"car"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message=" A title must be given")
     *  @Groups ({"car"})
     */
    private $title_adv;

    /**
     * @ORM\Column(type="float")
     * @Groups ({"car"})
     */
    private $price_adv;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull(message=" A description must be given")
     *  @Groups ({"car"})
     */
    private $description_adv;

    /**
     * @ORM\Column(type="date")
     */
    private $date_adv;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull(message=" A mileage must be given")
     * @Groups ({"car"})
     */
    private $mileage_adv;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="advertisements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Fueltype::class, inversedBy="advertisements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fueltype;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="advertisements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $garage;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="advertisement")
     * @Groups ({"car"})
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    public function __construct()
    {
        $this->image = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleAdv(): ?string
    {
        return $this->title_adv;
    }

    public function setTitleAdv(string $title_adv): self
    {
        $this->title_adv = $title_adv;

        return $this;
    }

    public function getPriceAdv(): ?float
    {
        return $this->price_adv;
    }

    public function setPriceAdv(float $price_adv): self
    {
        $this->price_adv = $price_adv;

        return $this;
    }

    public function getDescriptionAdv(): ?string
    {
        return $this->description_adv;
    }

    public function setDescriptionAdv(string $description_adv): self
    {
        $this->description_adv = $description_adv;

        return $this;
    }

    public function getDateAdv(): ?\DateTimeInterface
    {
        return $this->date_adv;
    }

    public function setDateAdv(\DateTimeInterface $date_adv): self
    {
        $this->date_adv = $date_adv;

        return $this;
    }

    public function getMileageAdv(): ?int
    {
        return $this->mileage_adv;
    }

    public function setMileageAdv(int $mileage_adv): self
    {
        $this->mileage_adv = $mileage_adv;

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

    public function getFueltype(): ?Fueltype
    {
        return $this->fueltype;
    }

    public function setFueltype(?Fueltype $fueltype): self
    {
        $this->fueltype = $fueltype;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * @return Collection|images[]
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(images $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
            $image->setAdvertisement($this);
        }

        return $this;
    }

    public function removeImage(images $image): self
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getAdvertisement() === $this) {
                $image->setAdvertisement(null);
            }
        }

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }
}
