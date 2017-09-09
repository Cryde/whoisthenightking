<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("personage")
 * @ORM\Entity()
 */
class Character
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $slug;
    /**
     * @var Theory
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Theory", mappedBy="character")
     */
    protected $theories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->theories = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Character
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Add theory
     *
     * @param Theory $theory
     *
     * @return Character
     */
    public function addTheory(Theory $theory)
    {
        $this->theories[] = $theory;

        return $this;
    }

    /**
     * Remove theory
     *
     * @param Theory $theory
     */
    public function removeTheory(Theory $theory)
    {
        $this->theories->removeElement($theory);
    }

    /**
     * Get theories
     *
     * @return \Doctrine\Common\Collections\Collection|Theory[]
     */
    public function getTheories()
    {
        return $this->theories;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;

        return $this;
    }
}
