<?php
namespace Stcw\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Stcw\StudentBundle\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */

class Category
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
     * @ORM\Column(type="string", length="100", nullable="true")
     */
    protected $longtitle;

    /**
     * @ORM\ManyToMany(targetEntity="Stcw\FormationBundle\Entity\Module", inversedBy="categories")
     * @ORM\JoinTable(name="categories_modules",
     * joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="module_id", referencedColumnName="id")}
     * )
     */
    protected $modules;
    
    /**
     * @ORM\OneToMany(targetEntity="Student", mappedBy="category", cascade={"persist"})
     */
    protected $students;

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
     * Set longtitle
     *
     * @param string $longtitle
     */
    public function setLongtitle($longtitle)
    {
        $this->longtitle = $longtitle;
    }

    /**
     * Get longtitle
     *
     * @return string 
     */
    public function getLongtitle()
    {
        return $this->longtitle;
    }

    public function __toString()
    {
        return $this->getTitle();
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