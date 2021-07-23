<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
#[ApiResource]
class Images
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
    private $url_img;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alt_img;

    /**
     * @ORM\ManyToOne(targetEntity=Advertisement::class, inversedBy="image")
     */
    private $advertisement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlImg(): ?string
    {
        return $this->url_img;
    }

    public function setUrlImg(string $url_img): self
    {
        $this->url_img = $url_img;

        return $this;
    }

    public function getAltImg(): ?string
    {
        return $this->alt_img;
    }

    public function setAltImg(string $alt_img): self
    {
        $this->alt_img = $alt_img;

        return $this;
    }

    public function getAdvertisement(): ?Advertisement
    {
        return $this->advertisement;
    }

    public function setAdvertisement(?Advertisement $advertisement): self
    {
        $this->advertisement = $advertisement;

        return $this;
    }
}
