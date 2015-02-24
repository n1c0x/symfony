<?php

namespace omg\gotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Personnage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Personnage
{
    /**
     *
     * @ORM\ManyToMany(targetEntity="Competences", mappedBy="personnages")
     * @ORM\JoinTable(name="personnage_competence",
     *      joinColumns={@ORM\JoinColumn(name="personnage_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="competence_id", referencedColumnName="id")}
     *      )
     */
    protected $competences;

    public function __construct()
    {
        $this->nom = "non défini";
        $this->description = "Aucune description";
        $this->maison = null;
        $this->age = null;
        $this->competences = new ArrayCollection();
    }

    /**
     *
     * @ORM\ManyToOne(targetEntity="Maison", inversedBy="personnages")
     * @ORM\JoinColumn(name="maison_id", referencedColumnName="id")
     *
     */
    protected $maison;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Experience", inversedBy="personnages")
     * @ORM\JoinColumn(name="exp_id", referencedColumnName="id")
     *
     */
    protected $age;
    

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
     * @return Personnage
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
     * @return Personnage
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
     * Set maison
     *
     * @param \omg\gotBundle\Entity\Maison $maison
     * @return Personnage
     */
    public function setMaison(\omg\gotBundle\Entity\Maison $maison = null)
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * Get maison
     *
     * @return \omg\gotBundle\Entity\Maison 
     */
    public function getMaison()
    {
        return $this->maison;
    }

    /**
     * Set age
     *
     * @param \omg\gotBundle\Entity\Experience $age
     * @return Personnage
     */
    public function setAge(\omg\gotBundle\Entity\Experience $age = null)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return \omg\gotBundle\Entity\Experience 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Add competences
     *
     * @param \omg\gotBundle\Entity\Competences $competences
     * @return Personnage
     */
    public function addCompetence(\omg\gotBundle\Entity\Competences $competences)
    {
        $this->competences[] = $competences;

        return $this;
    }

    /**
     * Remove competences
     *
     * @param \omg\gotBundle\Entity\Competences $competences
     */
    public function removeCompetence(\omg\gotBundle\Entity\Competences $competences)
    {
        $this->competences->removeElement($competences);
    }

    /**
     * Get competences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetences()
    {
        return $this->competences;
    }
}
