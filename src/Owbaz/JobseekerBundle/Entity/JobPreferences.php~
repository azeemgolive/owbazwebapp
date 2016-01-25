<?php

namespace Owbaz\JobseekerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Owbaz\JobseekerBundle\Repository\JobPreferencesRepository")
 * @ORM\Table(name="job_preferences")
 * @ORM\HasLifecycleCallbacks()
 */
class JobPreferences
{
    
     /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Countries", inversedBy="jobpreference")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id",onDelete="No Action")
     */    
     protected $country;     
     
     /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\JobsCategories", inversedBy="jobpreference")
     * @ORM\JoinColumn(name="job_categories_id", referencedColumnName="id",onDelete="No Action")
     */
    protected $jobcategory;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\UserBundle\Entity\User", inversedBy="jobpreference")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id" , onDelete="No Action")
     */
    protected $users;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",nullable=true)
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
     * Set description
     *
     * @param string $description
     *
     * @return JobPreferences
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
     * Set country
     *
     * @param \Owbaz\SiteBundle\Entity\Countries $country
     *
     * @return JobPreferences
     */
    public function setCountry(\Owbaz\SiteBundle\Entity\Countries $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Owbaz\SiteBundle\Entity\Countries
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set jobcategory
     *
     * @param \Owbaz\SiteBundle\Entity\JobsCategories $jobcategory
     *
     * @return JobPreferences
     */
    public function setJobcategory(\Owbaz\SiteBundle\Entity\JobsCategories $jobcategory = null)
    {
        $this->jobcategory = $jobcategory;

        return $this;
    }

    /**
     * Get jobcategory
     *
     * @return \Owbaz\SiteBundle\Entity\JobsCategories
     */
    public function getJobcategory()
    {
        return $this->jobcategory;
    }

    /**
     * Set users
     *
     * @param \Owbaz\UserBundle\Entity\User $users
     *
     * @return JobPreferences
     */
    public function setUsers(\Owbaz\UserBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \Owbaz\UserBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }
}
