<?php

namespace Owbaz\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
  * @ORM\Entity(repositoryClass="Owbaz\SiteBundle\Repository\JobsCategoriesRepository")
 * @ORM\Table(name="jobs_categories")
 *
 */
class JobsCategories
{
    
    //--------------------------------------one to many relationship with locations------------------------------
    /**
     * @ORM\OneToMany(targetEntity="Owbaz\JobsBundle\Entity\Jobs", mappedBy="jobcategory",orphanRemoval=true)
    */
    protected $jobs;    
    
    public function __construct()
    {
        $this->jobs = new ArrayCollection();       
    }

    
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
     * @ORM\Column(name="job_category_name", type="string", length=255)
     */
    private $jobCategoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="isActive", type="string", length=255,nullable=true)
     */
    private $isActive;

    /**
     * @var datetime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;


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
     * Set jobCategoryName
     *
     * @param string $jobCategoryName
     *
     * @return JobsCategories
     */
    public function setJobCategoryName($jobCategoryName)
    {
        $this->jobCategoryName = $jobCategoryName;

        return $this;
    }

    /**
     * Get jobCategoryName
     *
     * @return string
     */
    public function getJobCategoryName()
    {
        return $this->jobCategoryName;
    }

    /**
     * Set isActive
     *
     * @param string $isActive
     *
     * @return JobsCategories
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
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return JobsCategories
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
     * @param string $updatedAt
     *
     * @return JobsCategories
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add job
     *
     * @param \Owbaz\JobsBundle\Entity\Jobs $job
     *
     * @return JobsCategories
     */
    public function addJob(\Owbaz\JobsBundle\Entity\Jobs $job)
    {
        $this->jobs[] = $job;

        return $this;
    }

    /**
     * Remove job
     *
     * @param \Owbaz\JobsBundle\Entity\Jobs $job
     */
    public function removeJob(\Owbaz\JobsBundle\Entity\Jobs $job)
    {
        $this->jobs->removeElement($job);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}
