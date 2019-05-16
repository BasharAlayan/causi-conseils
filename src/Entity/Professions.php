<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 15/05/2019
 * Time: 14:06
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Professions
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
    protected $professions;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="TagProfession")
     */
    protected $users;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfessions(): ?string
    {
        return $this->professions;
    }

    public function setProfessions(string $professions)
    {
        $this->professions = $professions;
    }

    public function __toString()
    {
        return $this->professions;
    }

    public function getUsers(): ?string
    {
        return $this->users;
    }

    public function addProduct(User $user)
    {
        $this->users[] = $user;

        return $this;
    }
}