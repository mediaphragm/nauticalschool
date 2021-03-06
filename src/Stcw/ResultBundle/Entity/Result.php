<?php

/*
 * This file is part of the Nautical School Application.
 *
 * (c) Christophe Willemsen <willemsen.christophe@gmail.com>
 *
 */
namespace Stcw\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Stcw\ResultBundle\Repository\ResultRepository")
 * @ORM\Table(name="result")
 */

class Result
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
    protected $score;
    
    /**
     * @ORM\ManyToOne(targetEntity="Stcw\StudentBundle\Entity\Student")
     */
    protected $student;
    
        /**
     * @ORM\ManyToOne(targetEntity="Stcw\FormationBundle\Entity\Course")
     */
    protected $course;
    
    /**
     * @ORM\ManyToMany(targetEntity="ResultReport", mappedBy="results", cascade={"persist"})
     */
    protected $report;
    
    public function __construct()
    {
        $this->report = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set score
     *
     * @param string $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * Get score
     *
     * @return string 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set student
     *
     * @param Stcw\StudentBundle\Entity\Student $student
     */
    public function setStudent(\Stcw\StudentBundle\Entity\Student $student)
    {
        $this->student = $student;
    }

    /**
     * Get student
     *
     * @return Stcw\StudentBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Add report
     *
     * @param Stcw\ResultBundle\Entity\ResultReport $report
     */
    public function addReport(\Stcw\ResultBundle\Entity\ResultReport $report)
    {
        $this->report[] = $report;
    }

    /**
     * Get report
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Set course
     *
     * @param Stcw\FormationBundle\Entity\Course $course
     */
    public function setCourse(\Stcw\FormationBundle\Entity\Course $course)
    {
        $this->course = $course;
    }

    /**
     * Get course
     *
     * @return Stcw\FormationBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}