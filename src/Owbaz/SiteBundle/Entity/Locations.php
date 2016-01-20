<?php

namespace Owbaz\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Owbaz\SiteBundle\Repository\LocationsRepository")
 * @ORM\Table(name="jobsite_locations")
 * @ORM\HasLifecycleCallbacks()
 */
class Locations
{

    // ...

    /**
     * @ORM\ManyToOne(targetEntity="Countries", inversedBy="location")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $country;
    /**
     * @ORM\OneToMany(targetEntity="Owbaz\UserBundle\Entity\User", mappedBy="location",orphanRemoval=true)
     */
    protected $users; 
    /**
     * @ORM\OneToMany(targetEntity="Owbaz\JobsBundle\Entity\Jobs", mappedBy="location",orphanRemoval=true)
     */
    protected $jobs; 
     
   public function __construct()
    {
        $this->users = new ArrayCollection();       
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
     * @ORM\Column(name="area_name", type="string", length=255)
     */
    private $area_name;

    /**
     * @var string
     *
     * @ORM\Column(name="area_code", type="string", length=255)
     */
    private $area_code;

    

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
     * Set areaName
     *
     * @param string $areaName
     *
     * @return Locations
     */
    public function setAreaName($areaName)
    {
        $this->area_name = $areaName;

        return $this;
    }

    /**
     * Get areaName
     *
     * @return string
     */
    public function getAreaName()
    {
        return $this->area_name;
    }

    /**
     * Set areaCode
     *
     * @param string $areaCode
     *
     * @return Locations
     */
    public function setAreaCode($areaCode)
    {
        $this->area_code = $areaCode;

        return $this;
    }

    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode()
    {
        return $this->area_code;
    }

    /**
     * Set country
     *
     * @param \Owbaz\SiteBundle\Entity\Countries $country
     *
     * @return Locations
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
     * Add user
     *
     * @param \Owbaz\UserBundle\Entity\User $user
     *
     * @return Locations
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

    /**
     * Add job
     *
     * @param \Owbaz\JobsBundle\Entity\Jobs $job
     *
     * @return Locations
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
