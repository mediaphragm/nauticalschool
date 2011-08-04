<?php
namespace Stcw\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Stcw\StudentBundle\Repository\ClasseRepository")
 * @ORM\Table(name="classe")
 */

class Classe
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
     * @ORM\ManyToOne(targetEntity="School", inversedBy="classes")
     */
    protected $school;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Student", mappedBy="classe")
     */
    protected $students;
    
    public function __toString()
    {
        return $this->title;
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
     * Set school
     *
     * @param Stcw\StudentBundle\Entity\School $school
     */
    public function setSchool(\Stcw\StudentBundle\Entity\School $school)
    {
        $this->school = $school;
    }

    /**
     * Get school
     *
     * @return Stcw\StudentBundle\Entity\School 
     */
    public function getSchool()
    {
        return $this->school;
    }
    public function __construct()
    {
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add students
     *
     * @param Stcw\StudentBundle\Entity\Student $students
     */
    public function addStudents(\Stcw\StudentBundle\Entity\Student $students)
    {
        $this->students[] = $students;
    }

    /**
     * Get students
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getStudents()
    {
        return $this->students;
    }
}