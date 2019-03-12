<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", options={"default":"1"})
     */
    private $status = 1;

    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=50)
     * @Groups({"main"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     * @Assert\Length(min=3, max=50)
     * @Assert\NotBlank()
     * @Groups({"main"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     * @Assert\Length(min=3, max=50)
     * @Assert\NotBlank()
     * @Groups({"main"})
     */
    private $forname;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

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
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=8, max=8000)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $portrait;

    public function __toString() {
        return $this->username;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

     public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getForname(): ?string
    {
        return $this->forname;
    }

    public function setForname(string $forname): self
    {
        $this->forname = $forname;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        // $roles[] = 'ROLE_USER';
        if (!$roles) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set undocumented variable
     *
     * @return  self
     */ 
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getPortrait(): ?string
    {
        return $this->portrait;
    }

    public function setPortrait(?string $portrait): self
    {
        $this->portrait = $portrait;

        return $this;
    }

}
