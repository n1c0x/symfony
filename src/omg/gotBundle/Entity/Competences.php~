<?php

namespace omg\gotBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Competences
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Competences
{
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Personnage", mappedBy="competences")
     * @ORM\JoinTable(name="personnage_competence",
     *      joinColumns={@ORM\JoinColumn(name="competence_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="personnage_id", referencedColumnName="id")}
     *      )
     */
    protected $personnages;

    public function __construct() 
    {
        $this->nom = "aucun nom de compétences défini";
        $this->description = "Aucune description";
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
     * @return Competences
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
     * Set description
     *
     * @param string $description
     * @return Competences
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
     * @return Competences
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
