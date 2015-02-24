<?php

namespace omg\gotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maison
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Maison
{

    /**
     *
     * @ORM\OneToMany(targetEntity="Personnage", mappedBy="maison")
     *
     */
    protected $personnages;

    public function  __construct()
    {
        $this->personages = new ArrayCollection();
    }

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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Devise", type="text")
     */
    private $devise;

    /**
     * @var string
     *
     * @ORM\Column(name="Blason", type="text")
     */
    private $blason;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
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
     * Set nom
     *
     * @param string $nom
     * @return Maison
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set devise
     *
     * @param string $devise
     * @return Maison
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return string 
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set blason
     *
     * @param string $blason
     * @return Maison
     */
    public function setBlason($blason)
    {
        $this->blason = $blason;

        return $this;
    }

    /**
     * Get blason
     *
     * @return string 
     */
    public function getBlason()
    {
        return $this->blason;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Maison
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

    /**
     * Add personnages
     *
     * @param \omg\gotBundle\Entity\Personnage $personnages
     * @return Maison
     */
    public function addPersonnage(\omg\gotBundle\Entity\Personnage $personnages)
    {
        $this->personnages[] = $personnages;

        return $this;
    }

    /**
     * Remove personnages
     *
     * @param \omg\gotBundle\Entity\Personnage $personnages
     */
    public function removePersonnage(\omg\gotBundle\Entity\Personnage $personnages)
    {
        $this->personnages->removeElement($personnages);
    }

    /**
     * Get personnages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonnages()
    {
        return $this->personnages;
    }
}