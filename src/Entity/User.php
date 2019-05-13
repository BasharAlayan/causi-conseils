<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *     fields={"email"},
 *     message="L'email que vous avez tapé est déjà utilisé")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage="Votre mot de passe doit etre minimum 8 caractères")
     */
    private $password;
    /**
     * @Assert\EqualTo(propertyPath="password", message="Vous n'avez pas tapé le meme mot de passe")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $availability;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metiers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $List;


    /**
     * @ORM\ManyToMany(targetEntity="Tags", inversedBy="users", cascade={"persist"})
     */
    private $TagsCenterInterest;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Veuillez télécharger votre CV sous forme de fichier PDF.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     *
     */
    private $file;


    public function __construct()
    {
        $this->TagsCenterInterest=new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    public function setFirstName(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAvailability(): ?\DateTimeInterface
    {
        return $this->availability;
    }

    public function setAvailability(\DateTimeInterface $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getMetiers(): ?string
    {
        return $this->metiers;
    }

    public function setMetiers(string  $metiers): self
    {
        $this->metiers = $metiers;

        return $this;
    }

    public function addTagCenterInterest(\App\Entity\Tags $tag)
    {
        $this->TagsCenterInterest[]=$tag;
        return $this;
    }

    public function removeTag(\App\Entity\Tags $tag)
    {
        $this->TagsCenterInterest->removeElement($tag);
    }

    public function getTagsCenterInterest()
    {
        return $this->TagsCenterInterest;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created;
    }

    public function setCreatedAt(\DateTimeInterface $created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->List;
    }

    /**
     * @param mixed $List
     */
    public function setList($List): void
    {
        $this->List = $List;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
