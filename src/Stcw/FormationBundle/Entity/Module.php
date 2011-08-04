<?php
namespace Stcw\FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Stcw\FormationBundle\Repository\ModuleRepository")
 * @ORM\Table(name="module")
 */

class Module
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="100")
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @ORM\Column(type="integer", nullable="true")
     */
    protected $credit;

    /**
     * @ORM\Column(type="integer", nullable="true")
     */
    protected $si;

    /**
     * @ORM\Column(type="integer")
     */
    protected $level;

    /**
     * @ORM\ManyToMany(targetEntity="Course", inversedBy="modules")
     * @ORM\JoinTable(name="modules_courses",
     * joinColumns={@ORM\JoinColumn(name="module_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="course_id", referencedColumnName="id")})
     */
    protected $courses;
    
    /**
     * @ORM\ManyToMany(targetEntity="Stcw\StudentBundle\Entity\Category", mappedBy="modules", cascade={"persist"})
     * @ORM\OrderBy({"code" = "ASC"})
     */
    protected $categories;
    
    
    public function __construct()
    {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set level
     *
     * @param integer $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Add courses
     *
     * @param Stcw\FormationBundle\Entity\Course $courses
     */
    public function addCourses(\Stcw\FormationBundle\Entity\Course $courses)
    {
        $this->courses[] = $courses;
    }

    /**
     * Get courses
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCourses()
    {
        return $this->courses;
    }
    
    public function __toString()
    {
        return $this->title;
    }

    /**
     * Add categories
     *
     * @param Stcw\FormationBundle\Entity\Category $categories
     */
    public function addCategories(\Stcw\FormationBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}