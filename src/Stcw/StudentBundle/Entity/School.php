<?php
namespace Stcw\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Stcw\StudentBundle\Repository\SchoolRepository")
 * @ORM\Table(name="school")
 */

class School
{
        /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $title;
    
    /**
     * @ORM\Column(type="string", nullable="true")
     */
    protected $fulltitle;
    
    /**
     * @ORM\OneToMany(targetEntity="Classe", mappedBy="school", cascade={"persist"})
     */
    protected $classes;
    public function __construct()
    {
        $this->classes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set fulltitle
     *
     * @param string $fulltitle
     */
    public function setFulltitle($fulltitle)
    {
        $this->fulltitle = $fulltitle;
    }

    /**
     * Get fulltitle
     *
     * @return string 
     */
    public function getFulltitle()
    {
        return $this->fulltitle;
    }

    /**
     * Add classes
     *
     * @param Stcw\StudentBundle\Entity\Classe $classes
     */
    public function addClasses(\Stcw\StudentBundle\Entity\Classe $classes)
    {
        $this->classes[] = $classes;
    }

    /**
     * Get classes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClasses()
    {
        return $this->classes;
    }
    
    public function __toString()
    {
        return $this->title;
    }
}