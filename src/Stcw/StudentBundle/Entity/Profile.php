<?php

namespace Stcw\StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Stcw\StudentBundle\Repository\ProfileRepository")
 * @ORM\Table(name="profile")
 */

class Profile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Student", mappedBy="profile")
     */
    protected $student;

    /**
     * @ORM\Column(type="string", length="10")
     */
    protected $language;
    
    /**
     * @ORM\Column(type="datetime", nullable="true")
     * 
     */
    protected $date_of_birth;
    
    /**
     * @ORM\Column(type="string", nullable="true")
     * 
     */
    protected $place_of_birth;

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
     * Set student
     *
     * @param integer $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }

    /**
     * Get student
     *
     * @return integer 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set language
     *
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->formatLang($this->language);
    }

        public function __toString()
    {
        $langs = array('fr'=>'FR', 'nl'=>'NL', 'en'=>'EN', 'de'=>'DE');
        return $langs[$this->getLanguage()];
    }
    
    public function formatLang($lang)
    {
        $langs = array(''=>'','fr' => 'French', 'nl' => 'Dutch', 'en' => 'English', 'de' => 'German');
        return $langs[$lang];
    }

    /**
     * Set date_of_birth
     *
     * @param datetime $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->date_of_birth = $dateOfBirth;
    }

    /**
     * Get date_of_birth
     *
     * @return datetime 
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * Set place_of_birth
     *
     * @param string $placeOfBirth
     */
    public function setPlaceOfBirth($placeOfBirth)
    {
        $this->place_of_birth = $placeOfBirth;
    }

    /**
     * Get place_of_birth
     *
     * @return string 
     */
    public function getPlaceOfBirth()
    {
        return $this->place_of_birth;
    }
}