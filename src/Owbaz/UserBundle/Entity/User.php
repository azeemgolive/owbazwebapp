<?php

namespace Owbaz\UserBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Owbaz\JobseekerBundle\ImageHelper;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Owbaz\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="jobsite_users")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements UserInterface, \Serializable {

    //-----------------------one to many relationship with contry-----------------------------------------
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Countries", inversedBy="users")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id",onDelete="No Action")
     */    
     protected $country;
     
     
     //-----------------------one to many relationship with contry-----------------------------------------
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Locations", inversedBy="users")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id",onDelete="No Action")
     */
      protected $location;
      
      
      //-----------------------one to many relationship with industry-----------------------------------------
    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Industries", inversedBy="users")
     * @ORM\JoinColumn(name="industry_id", referencedColumnName="id",onDelete="No Action")
     */
      protected $industry;

      
    /**
     * @ORM\OneToMany(targetEntity="Owbaz\JobsBundle\Entity\Jobs", mappedBy="users",orphanRemoval=true)
     */
    protected $jobs;


    /**
     * @ORM\OneToMany(targetEntity="UserDocument", mappedBy="users",orphanRemoval=true)
     */
    protected $documents;

    /**
     * @ORM\ManyToOne(targetEntity="Owbaz\SiteBundle\Entity\Nationality", inversedBy="users")
     * @ORM\JoinColumn(name="nationality_id", referencedColumnName="id",onDelete="No Action")
     */    
     protected $nationality;
    
     /**
     * @ORM\OneToMany(targetEntity="Owbaz\JobseekerBundle\Entity\JobPreferences", mappedBy="jobpreference",orphanRemoval=true)
     */
    protected $jobpreference; 
    
      
      
    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->jobpreference = new ArrayCollection();
        $this->salt = md5(uniqid(null, true));
        $this->documents = new ArrayCollection();
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
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=32, nullable=true)
     */
    private $salt;

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
     * @ORM\Column(name="industry_type", type="string", length=255,nullable=true)
     */
    private $industry_type;

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
     * @var string $authTokenWebService
     *
     * @ORM\Column(name="auth_token_web_service", type="string", length=50, nullable=true)
     * 
     */
    private $authTokenWebService;

    /**
     * @var dateTime $authTokenCreatedAt
     *
     * @ORM\Column(name="auth_token_created_at", type="datetime", nullable=true)
     */
    private $authTokenCreatedAt;

    
    /**
     * @Assert\File(maxSize="6000000")
     * @Assert\NotBlank(groups={"add"}, message = "must upload brand logo image!") 
     */
    public $file;
    
    /**
     * @Assert\File(maxSize="6000000")
     * @Assert\NotBlank(groups={"add"}, message = "must upload brand logo image!") 
     */
    public $company_file;
    
    
    
    
    

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
        $this->password = $password;

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
    
    
    //----------------------- Old password field used for resetting password only

    public $old_password;

    public function getOldpassword() {
        return $this->old_password;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->first_name;
    }
    
    
    /**
     * @inheritDoc
     */
    public function getRoles() {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return serialize(array(
                    $this->id,
                ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                ) = unserialize($serialized);
    }

    /**
     * Set industryType
     *
     * @param string $industryType
     *
     * @return User
     */
    public function setIndustryType($industryType)
    {
        $this->industry_type = $industryType;

        return $this;
    }

    /**
     * Get industryType
     *
     * @return string
     */
    public function getIndustryType()
    {
        return $this->industry_type;
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
     * Set industry
     *
     * @param \Owbaz\SiteBundle\Entity\Industries $industry
     *
     * @return User
     */
    public function setIndustry(\Owbaz\SiteBundle\Entity\Industries $industry = null)
    {
        $this->industry = $industry;

        return $this;
    }

    /**
     * Get industry
     *
     * @return \Owbaz\SiteBundle\Entity\Industries
     */
    public function getIndustry()
    {
        return $this->industry;
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

    /**
     * Set nationality
     *
     * @param \Owbaz\SiteBundle\Entity\Nationality $nationality
     *
     * @return User
     */
    public function setNationality(\Owbaz\SiteBundle\Entity\Nationality $nationality = null)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return \Owbaz\SiteBundle\Entity\Nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Add jobpreference
     *
     * @param \Owbaz\JobseekerBundle\Entity\JobPreferences $jobpreference
     *
     * @return User
     */
    public function addJobpreference(\Owbaz\JobseekerBundle\Entity\JobPreferences $jobpreference)
    {
        $this->jobpreference[] = $jobpreference;

        return $this;
    }

    /**
     * Remove jobpreference
     *
     * @param \Owbaz\JobseekerBundle\Entity\JobPreferences $jobpreference
     */
    public function removeJobpreference(\Owbaz\JobseekerBundle\Entity\JobPreferences $jobpreference)
    {
        $this->jobpreference->removeElement($jobpreference);
    }

    /**
     * Get jobpreference
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobpreference()
    {
        return $this->jobpreference;
    }
    
    

    //-------------------------------------------------
    //-------------- Image Upload ---------------------
    //-------------------------------------------------
    
    public function upload() {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }
        
       $ih=new ImageHelper('users', $this);
        $ih->upload();
    }
//---------------------------------------------------
    
  public function getAbsolutePath()
    {
        return null === $this->user_image
            ? null
            : $this->getUploadRootDir().'/'.$this->user_image;
    }
//---------------------------------------------------
    public function getWebPath()
    {
        return null === $this->user_image
            ? null
            : $this->getUploadDir().'/'.$this->user_image;
    }
//---------------------------------------------------
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
//---------------------------------------------------
    protected function getUploadDir()
    {
        return 'uploads/owbaz/users';
    }
    //---------------------------------------------------
    
 /**
 * @ORM\PostRemove
 */
public function deleteImages()
{
     $ih=new ImageHelper('users', $this);
     $ih->deleteImages($this->user_image);
}



//-------------------------------------------------
    //-------------- Image Upload ---------------------
    //-------------------------------------------------
    
    public function uploadCompanyLogo() {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }
        
       $ih=new ImageHelper('company_logo', $this);
        $ih->uploadCompanyLogo();
    }
//---------------------------------------------------
    
  public function getCompanyAbsolutePath()
    {
        return null === $this->company_logo
            ? null
            : $this->getCompanyUploadRootDir().'/'.$this->company_logo;
    }
//---------------------------------------------------
    public function getCompanyWebPath()
    {
        return null === $this->company_logo
            ? null
            : $this->getCompanyUploadDir().'/'.$this->company_logo;
    }
//---------------------------------------------------
    protected function getCompanyUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getCompanyUploadDir();
    }
//---------------------------------------------------
    protected function getCompanyUploadDir()
    {
        return 'uploads/owbaz/company_logo';
    }
    //---------------------------------------------------
    
 /**
 * @ORM\PostRemove
 */
public function deleteCompanyImages()
{
     $ih=new ImageHelper('company_logo', $this);
     $ih->deleteCompanyImages($this->company_logo);
}


    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set authTokenWebService
     *
     * @param string $authTokenWebService
     *
     * @return User
     */
    public function setAuthTokenWebService($authTokenWebService)
    {
        $this->authTokenWebService = $authTokenWebService;

        return $this;
    }

    /**
     * Get authTokenWebService
     *
     * @return string
     */
    public function getAuthTokenWebService()
    {
        return $this->authTokenWebService;
    }

    

    /**
     * Add document
     *
     * @param \Owbaz\UserBundle\Entity\UserDocument $document
     *
     * @return User
     */
    public function addDocument(\Owbaz\UserBundle\Entity\UserDocument $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \Owbaz\UserBundle\Entity\UserDocument $document
     */
    public function removeDocument(\Owbaz\UserBundle\Entity\UserDocument $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }
}
