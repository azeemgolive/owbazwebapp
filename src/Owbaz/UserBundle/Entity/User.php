<?php

namespace Owbaz\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="Owbaz\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="jobsite_users")
 */
class User
{
    //-----------------------one to many relationship with contry-----------------------------------------
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Countries", inversedBy="users")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id",onDelete="CASCADE")
     */    
     protected $country;
     
     
     //-----------------------one to many relationship with contry-----------------------------------------
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Locations", inversedBy="users")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id",onDelete="CASCADE")
     */
      protected $location;
      
    /**
     * @ORM\OneToMany(targetEntity="Owbaz\JobsBundle\Entity\Jobs", mappedBy="users",orphanRemoval=true)
     */
    protected $jobs;  
    
      
    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }
    
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name",type="string", length=255,nullable=true)
     */
    private $first_name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255,nullable=true)
     */
    private $last_name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255,nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=255,nullable=true)
     */
    private $phone_number;
    
    /**
     * @var string
     *
     * @ORM\Column(name="mobile_number", type="string", length=255,nullable=true)
     */
    private $mobile_number;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text",nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_person", type="string", length=255,nullable=true)
     */
    private $contact_person;

    
    /**
     * @var string
     *
     * @ORM\Column(name="user_education", type="string", length=255,nullable=true)
     */
    private $user_education;
    
     /**
     * @var string
     *
     * @ORM\Column(name="user_experience", type="string", length=255,nullable=true)
     */
    private $user_experience;
    
    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=255,nullable=true)
     */
    private $company_name;

    /**
     * @var string
     *
     * @ORM\Column(name="user_nationality", type="string", length=255,nullable=true)
     */
    private $user_nationality;
    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10,nullable=true)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date",nullable=true)
     */
    private $birth_date;

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
     * @var string
     *
     * @ORM\Column(name="user_image", type="string", length=255,nullable=true)
     */
    private $user_image;

    /**
     * @var string
     *
     * @ORM\Column(name="company_logo", type="string", length=255,nullable=true)
     */
    private $company_logo;

    /**
     * @var string
     *
     * @ORM\Column(name="company_website", type="string", length=255,nullable=true)
     */
    private $company_website;

    /**
     * @var string
     *
     * @ORM\Column(name="user_type", type="string", length=255,nullable=true)
     */
    public $user_type;

    /**
     * @var string
     *
     * @ORM\Column(name="company_description", type="text",nullable=true)
     */
    private $company_description;
    
    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive;
    
    /**
     * @var string $authToken
     *
     * @ORM\Column(name="auth_token", type="string", length=50, nullable=true)
     * 
     */
    private $authToken;
    
    /**
     * @var dateTime $authTokenCreatedAt
     *
     * @ORM\Column(name="auth_token_created_at", type="datetime", nullable=true)
     */
    private $authTokenCreatedAt;

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = md5($password);

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return User
     */
    public function setContactPerson($contactPerson)
    {
        $this->contact_person = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return User
     */
    public function setCompanyName($companyName)
    {
        $this->company_name = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
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
     * @return User
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
     * Set userImage
     *
     * @param string $userImage
     *
     * @return User
     */
    public function setUserImage($userImage)
    {
        $this->user_image = $userImage;

        return $this;
    }

    /**
     * Get userImage
     *
     * @return string
     */
    public function getUserImage()
    {
        return $this->user_image;
    }

    /**
     * Set companyLogo
     *
     * @param string $companyLogo
     *
     * @return User
     */
    public function setCompanyLogo($companyLogo)
    {
        $this->company_logo = $companyLogo;

        return $this;
    }

    /**
     * Get companyLogo
     *
     * @return string
     */
    public function getCompanyLogo()
    {
        return $this->company_logo;
    }

    /**
     * Set companyWebsite
     *
     * @param string $companyWebsite
     *
     * @return User
     */
    public function setCompanyWebsite($companyWebsite)
    {
        $this->company_website = $companyWebsite;

        return $this;
    }

    /**
     * Get companyWebsite
     *
     * @return string
     */
    public function getCompanyWebsite()
    {
        return $this->company_website;
    }

    /**
     * Set userType
     *
     * @param string $userType
     *
     * @return User
     */
    public function setUserType($userType)
    {
        $this->user_type = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Set companyDescription
     *
     * @param string $companyDescription
     *
     * @return User
     */
    public function setCompanyDescription($companyDescription)
    {
        $this->company_description = $companyDescription;

        return $this;
    }

    /**
     * Get companyDescription
     *
     * @return string
     */
    public function getCompanyDescription()
    {
        return $this->company_description;
    }

    /**
     * Set country
     *
     * @param \Owbaz\SiteBundle\Entity\Countries $country
     *
     * @return User
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
     * @return User
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
     * Set mobileNumber
     *
     * @param string $mobileNumber
     *
     * @return User
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobile_number = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobile_number;
    }

    /**
     * Set userEducation
     *
     * @param string $userEducation
     *
     * @return User
     */
    public function setUserEducation($userEducation)
    {
        $this->user_education = $userEducation;

        return $this;
    }

    /**
     * Get userEducation
     *
     * @return string
     */
    public function getUserEducation()
    {
        return $this->user_education;
    }

    /**
     * Set userExperience
     *
     * @param string $userExperience
     *
     * @return User
     */
    public function setUserExperience($userExperience)
    {
        $this->user_experience = $userExperience;

        return $this;
    }

    /**
     * Get userExperience
     *
     * @return string
     */
    public function getUserExperience()
    {
        return $this->user_experience;
    }

    /**
     * Set userNationality
     *
     * @param string $userNationality
     *
     * @return User
     */
    public function setUserNationality($userNationality)
    {
        $this->user_nationality = $userNationality;

        return $this;
    }

    /**
     * Get userNationality
     *
     * @return string
     */
    public function getUserNationality()
    {
        return $this->user_nationality;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set authToken
     *
     * @param string $authToken
     *
     * @return User
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;

        return $this;
    }

    /**
     * Get authToken
     *
     * @return string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * Set authTokenCreatedAt
     *
     * @param \DateTime $authTokenCreatedAt
     *
     * @return User
     */
    public function setAuthTokenCreatedAt($authTokenCreatedAt)
    {
        $this->authTokenCreatedAt = $authTokenCreatedAt;

        return $this;
    }

    /**
     * Get authTokenCreatedAt
     *
     * @return \DateTime
     */
    public function getAuthTokenCreatedAt()
    {
        return $this->authTokenCreatedAt;
    }

    /**
     * Add job
     *
     * @param \Owbaz\JobsBundle\Entity\Jobs $job
     *
     * @return User
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
