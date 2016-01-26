<?php

namespace Owbaz\JobsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="Owbaz\JobsBundle\Repository\JobsRepository")
 * @ORM\Table(name="jobsite_jobs")
 * @ORM\HasLifecycleCallbacks()
 */
class Jobs
{
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\UserBundle\Entity\User", inversedBy="jobs")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id" , onDelete="No Action")
     */
    protected $users;
    
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Countries", inversedBy="jobs")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id",onDelete="No Action")
     */
    protected $country;
    
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Locations", inversedBy="jobs")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id",onDelete="No Action")
     */
    protected $location;
    
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\JobsCategories", inversedBy="jobs")
     * @ORM\JoinColumn(name="job_categories_id", referencedColumnName="id",onDelete="No Action")
     */
    protected $jobcategory;
    
    
   
    /**
     * @var int
     *
     * @ORM\Column(name="job_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="job_title", type="string", length=255)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="job_description", type="text")
     */
    private $jobDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="job_salary", type="string", length=255)
     */
    private $jobSalary;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime",nullable=true)
     */
    private $startDate;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expire_date", type="datetime",nullable=true)
     */
    private $expireDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime",nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime",nullable=true)
     */
    private $updatedAt;

    /**
     * @var \isActive
     *
     * @ORM\Column(name="is_active", type="string", length=10,nullable=true)
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="job_type", type="string", length=255,nullable=true)
     */
    private $jobType;

    /**
     * @var string
     *
     * @ORM\Column(name="job_education", type="string", length=255,nullable=true)
     */
    private $job_education;
    
    /**
     * @var string
     *
     * @ORM\Column(name="job_experience", type="string", length=255,nullable=true)
     */
    private $job_experience;
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set jobTitle
     *
     * @param string $jobTitle
     *
     * @return Jobs
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get jobTitle
     *
     * @return string
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set jobDescription
     *
     * @param string $jobDescription
     *
     * @return Jobs
     */
    public function setJobDescription($jobDescription)
    {
        $this->jobDescription = $jobDescription;

        return $this;
    }

    /**
     * Get jobDescription
     *
     * @return string
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * Set jobSalary
     *
     * @param string $jobSalary
     *
     * @return Jobs
     */
    public function setJobSalary($jobSalary)
    {
        $this->jobSalary = $jobSalary;

        return $this;
    }

    /**
     * Get jobSalary
     *
     * @return string
     */
    public function getJobSalary()
    {
        return $this->jobSalary;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Jobs
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    

    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return Jobs
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Jobs
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }



    





    /**
     * Set employer
     *
     * @param \Owbaz\EmployerBundle\Entity\Employees $employer
     *
     * @return Jobs
     */
    public function setEmployer(\Owbaz\EmployerBundle\Entity\Employees $employer = null)
    {
        $this->employer = $employer;

        return $this;
    }

    /**
     * Get employer
     *
     * @return \Owbaz\EmployerBundle\Entity\Employees
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * Set users
     *
     * @param \Owbaz\UserBundle\Entity\User $users
     *
     * @return Jobs
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

    /**
     * Set country
     *
     * @param \Owbaz\SiteBundle\Entity\Countries $country
     *
     * @return Jobs
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
     * Set location
     *
     * @param \Owbaz\SiteBundle\Entity\Locations $location
     *
     * @return Jobs
     */
    public function setLocation(\Owbaz\SiteBundle\Entity\Locations $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \Owbaz\SiteBundle\Entity\Locations
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set jobcategory
     *
     * @param \Owbaz\SiteBundle\Entity\JobsCategories $jobcategory
     *
     * @return Jobs
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
     * Set expireDate
     *
     * @param \DateTime $expireDate
     *
     * @return Jobs
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * Get expireDate
     *
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    

    /**
     * Set jobType
     *
     * @param string $jobType
     *
     * @return Jobs
     */
    public function setJobType($jobType)
    {
        $this->jobType = $jobType;

        return $this;
    }

    /**
     * Get jobType
     *
     * @return string
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * Set isActive
     *
     * @param string $isActive
     *
     * @return Jobs
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return string
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set jobEducation
     *
     * @param string $jobEducation
     *
     * @return Jobs
     */
    public function setJobEducation($jobEducation)
    {
        $this->job_education = $jobEducation;

        return $this;
    }

    /**
     * Get jobEducation
     *
     * @return string
     */
    public function getJobEducation()
    {
        return $this->job_education;
    }

    /**
     * Set jobExperience
     *
     * @param string $jobExperience
     *
     * @return Jobs
     */
    public function setJobExperience($jobExperience)
    {
        $this->job_experience = $jobExperience;

        return $this;
    }

    /**
     * Get jobExperience
     *
     * @return string
     */
    public function getJobExperience()
    {
        return $this->job_experience;
    }
}
