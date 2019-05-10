<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 09/05/2019
 * Time: 14:58
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Tags
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $CenterInterest;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="TagsCenterInterest")
     */
    protected $users;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCenterInterest(): ?string
    {
        return $this->CenterInterest;
    }

    public function setCenterInterest(string $CenterInterest)
    {
        $this->CenterInterest = $CenterInterest;
    }

    public function getUsers() : ?string
    {
        return $this->users;
    }

    public function addProduct(\App\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    public function removeProduct(\App\Entity\User $user)
    {
        $this->users->removeElement($user);
    }
}