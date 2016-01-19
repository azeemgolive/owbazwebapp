<?php

namespace Owbaz\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="jobsite_industries")
 * @ORM\Entity(repositoryClass="Owbaz\SiteBundle\Repository\IndustriesRepository")
 */
class Industries
{
    /**
     * @ORM\OneToMany(targetEntity="Owbaz\UserBundle\Entity\User", mappedBy="industry",orphanRemoval=true)
     */
    protected $users;
    
     
    
    public function __construct()
    {
       
        $this->users = new ArrayCollection();
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
     * @ORM\Column(name="industry_name", type="string", length=255)
     */
    private $industryName;


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
     * Set industryName
     *
     * @param string $industryName
     *
     * @return IndustryType
     */
    public function setIndustryName($industryName)
    {
        $this->industryName = $industryName;

        return $this;
    }

    /**
     * Get industryName
     *
     * @return string
     */
    public function getIndustryName()
    {
        return $this->industryName;
    }

    /**
     * Add job
     *
     * @param \Owbaz\JobsBundle\Entity\Jobs $job
     *
     * @return IndustryType
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

    /**
     * Add user
     *
     * @param \Owbaz\UserBundle\Entity\User $user
     *
     * @return Industries
     */
    public function addUser(\Owbaz\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Owbaz\UserBundle\Entity\User $user
     */
    public function removeUser(\Owbaz\UserBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
