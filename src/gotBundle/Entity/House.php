<?php

namespace gotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * House
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class House
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="catchphrase", type="string", length=255)
     */
    private $catchphrase;

    /**
     * @var string
     *
     * @ORM\Column(name="heraldry", type="string", length=255)
     */
    private $heraldry;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return House
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set catchphrase
     *
     * @param string $catchphrase
     * @return House
     */
    public function setCatchphrase($catchphrase)
    {
        $this->catchphrase = $catchphrase;

        return $this;
    }

    /**
     * Get catchphrase
     *
     * @return string 
     */
    public function getCatchphrase()
    {
        return $this->catchphrase;
    }

    /**
     * Set heraldry
     *
     * @param string $heraldry
     * @return House
     */
    public function setHeraldry($heraldry)
    {
        $this->heraldry = $heraldry;

        return $this;
    }

    /**
     * Get heraldry
     *
     * @return string 
     */
    public function getHeraldry()
    {
        return $this->heraldry;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return House
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
