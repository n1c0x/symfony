<?php

namespace gotBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="start_exp", type="integer")
     */
    private $startExp;


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
     * Set age
     *
     * @param integer $age
     * @return Experience
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set startExp
     *
     * @param integer $startExp
     * @return Experience
     */
    public function setStartExp($startExp)
    {
        $this->startExp = $startExp;

        return $this;
    }

    /**
     * Get startExp
     *
     * @return integer 
     */
    public function getStartExp()
    {
        return $this->startExp;
    }
}
