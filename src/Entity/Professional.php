<?php

namespace App\Entity;

use App\Repository\ProfessionalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ProfessionalRepository::class)
 */
class Professional implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username_pro;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $firstname_pro;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $lastname_pro;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $email_pro;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $telephone_pro;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $siren_pro;

    /**
     * @return mixed
     */
    public function getUsernamePro()
    {
        return $this->username_pro;
    }

    /**
     * @param mixed $username_pro
     */
    public function setUsernamePro($username_pro): void
    {
        $this->username_pro = $username_pro;
    }

    /**
     * @return mixed
     */
    public function getFirstnamePro()
    {
        return $this->firstname_pro;
    }

    /**
     * @param mixed $firstname_pro
     */
    public function setFirstnamePro($firstname_pro): void
    {
        $this->firstname_pro = $firstname_pro;
    }

    /**
     * @return mixed
     */
    public function getLastnamePro()
    {
        return $this->lastname_pro;
    }

    /**
     * @param mixed $lastname_pro
     */
    public function setLastnamePro($lastname_pro): void
    {
        $this->lastname_pro = $lastname_pro;
    }

    /**
     * @return mixed
     */
    public function getEmailPro()
    {
        return $this->email_pro;
    }

    /**
     * @param mixed $email_pro
     */
    public function setEmailPro($email_pro): void
    {
        $this->email_pro = $email_pro;
    }

    /**
     * @return mixed
     */
    public function getTelephonePro()
    {
        return $this->telephone_pro;
    }

    /**
     * @param mixed $telephone_pro
     */
    public function setTelephonePro($telephone_pro): void
    {
        $this->telephone_pro = $telephone_pro;
    }

    /**
     * @return mixed
     */
    public function getSirenPro()
    {
        return $this->siren_pro;
    }

    /**
     * @param mixed $siren_pro
     */
    public function setSirenPro($siren_pro): void
    {
        $this->siren_pro = $siren_pro;
    }

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Garage::class, mappedBy="professional", orphanRemoval=true)
     */
    private $garage;

    /**
     * @ORM\OneToOne(targetEntity=images::class, cascade={"persist", "remove"})
     */
    private $image;

    public function __construct()
    {
        $this->garage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Garage[]
     */
    public function getGarage(): Collection
    {
        return $this->garage;
    }

    public function addGarage(Garage $garage): self
    {
        if (!$this->garage->contains($garage)) {
            $this->garage[] = $garage;
            $garage->setProfessional($this);
        }

        return $this;
    }

    public function removeGarage(Garage $garage): self
    {
        if ($this->garage->removeElement($garage)) {
            // set the owning side to null (unless already changed)
            if ($garage->getProfessional() === $this) {
                $garage->setProfessional(null);
            }
        }

        return $this;
    }

    public function getImage(): ?images
    {
        return $this->image;
    }

    public function setImage(?images $image): self
    {
        $this->image = $image;

        return $this;
    }
}
