<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 15/05/2019
 * Time: 13:49
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Competencies
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
    protected $competencies;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="TagCompetencie")
     */
    protected $users;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetencies(): ?string
    {
        return $this->competencies;
    }

    public function setCompetencies(string $competencies)
    {
        $this->competencies = $competencies;
    }

    public function __toString()
    {
        return $this->competencies;
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