<?php

namespace omg\gotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Experience
{
    /**
     *
     * 
     * @ORM\OnetoMany(targetEntity="Personnage", mappedBy="age")
     *
     */ 
    protected $personnages;

    public function __construct()
    {
        $this->nom = "Aucune définition d'experience";
        $this->points = 0;
        $this->personnages = new ArrayCollection();
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
     * @var integer
     *
     * @ORM\Column(name="Points", type="integer")
     */
    private $points;


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
     * @return Experience
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
     * Set points
     *
     * @param integer $points
     * @return Experience
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Add personnages
     *
     * @param \omg\gotBundle\Entity\Personnage $personnages
     * @return Experience
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
