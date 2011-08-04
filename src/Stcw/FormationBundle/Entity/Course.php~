<?php
namespace Stcw\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Stcw\FormationBundle\Repository\CourseRepository")
 * @ORM\Table(name="course")
 */

class Course
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $code;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @ORM\Column(type="integer", nullable="true")
     *
     */
    protected $credit;

    /**
     * @ORM\Column(type="integer", nullable="true")
     *
     */
    protected $si;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank()
     */
    protected $exam;
    
    /**
     * @ORM\ManyToMany(targetEntity="Module", mappedBy="courses", cascade={"persist"})
     */
    protected $modules;

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
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
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
     * Set credit
     *
     * @param integer $credit
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;
    }

    /**
     * Get credit
     *
     * @return integer 
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set si
     *
     * @param integer $si
     */
    public function setSi($si)
    {
        $this->si = $si;
    }

    /**
     * Get si
     *
     * @return integer 
     */
    public function getSi()
    {
        return $this->si;
    }

    /**
     * Set exam
     *
     * @param boolean $exam
     */
    public function setExam($exam)
    {
        $this->exam = $exam;
    }

    /**
     * Get exam
     *
     * @return boolean 
     */
    public function getExam()
    {
        return $this->exam;
    }

    public function __toString()
    {
        return $this->code.'-'.$this->title;
    }
    public function __construct()
    {
        $this->modules = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add modules
     *
     * @param Stcw\FormationBundle\Entity\Module $modules
     */
    public function addModules(\Stcw\FormationBundle\Entity\Module $modules)
    {
        $this->modules[] = $modules;
    }

    /**
     * Get modules
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getModules()
    {
        return $this->modules;
    }
}