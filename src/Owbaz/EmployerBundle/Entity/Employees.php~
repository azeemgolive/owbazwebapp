<?php

namespace Owbaz\EmployerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
  * @ORM\Entity(repositoryClass="Owbaz\EmployerBundle\Repository\EmployeesRepository")
 * @ORM\Table(name="jobsite_employees")
 */
class Employees
{


    /**
     * @ORM\OneToMany(targetEntity="Owbaz\JobsBundle\Entity\Jobs", mappedBy="employer",orphanRemoval=true)
     */

    protected $jobs;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="employer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;





    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_logo", type="string", length=255)
     */
    private $employer_logo;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_country", type="string", length=255)
     */
    private $employer_country;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_industry", type="string", length=255)
     */
    private $employer_industry;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_type", type="string", length=255)
     */
    private $employer_type;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */

    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;
    /**
     * @var string
     *
     * @ORM\Column(name="contact_person", type="string", length=255)
     */
    private $contactPerson;

    /**
     * @var text
     *
     * @ORM\Column(name="company_description", type="text")
     */
    private $companyDescription;

    /**
     * @var text
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="employer_website", type="string", length=255)
     */
    private $employerWebsite;


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
     * Set company
     *
     * @param string $company
     *
     * @return Employees
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Employees
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
     * @return Employees
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

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return Employees
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Set companyDescription
     *
     * @param string $companyDescription
     *
     * @return Employees
     */
    public function setCompanyDescription($companyDescription)
    {
        $this->companyDescription = $companyDescription;

        return $this;
    }

    /**
     * Get companyDescription
     *
     * @return string
     */
    public function getCompanyDescription()
    {
        return $this->companyDescription;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Employees
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Employees
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set employerWebsite
     *
     * @param string $employerWebsite
     *
     * @return Employees
     */
    public function setEmployerWebsite($employerWebsite)
    {
        $this->employerWebsite = $employerWebsite;

        return $this;
    }

    /**
     * Get employerWebsite
     *
     * @return string
     */
    public function getEmployerWebsite()
    {
        return $this->employerWebsite;
    }









    /**
     * Add job
     *
     * @param \Owbaz\JobsBundle\Entity\Jobs $job
     *
     * @return Employees
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
     * Set employerLogo
     *
     * @param string $employerLogo
     *
     * @return Employees
     */
    public function setEmployerLogo($employerLogo)
    {
        $this->employer_logo = $employerLogo;

        return $this;
    }

    /**
     * Get employerLogo
     *
     * @return string
     */
    public function getEmployerLogo()
    {
        return $this->employer_logo;
    }

    /**
     * Set employerCountry
     *
     * @param string $employerCountry
     *
     * @return Employees
     */
    public function setEmployerCountry($employerCountry)
    {
        $this->employer_country = $employerCountry;

        return $this;
    }

    /**
     * Get employerCountry
     *
     * @return string
     */
    public function getEmployerCountry()
    {
        return $this->employer_country;
    }

    /**
     * Set employerIndustry
     *
     * @param string $employerIndustry
     *
     * @return Employees
     */
    public function setEmployerIndustry($employerIndustry)
    {
        $this->employer_industry = $employerIndustry;

        return $this;
    }

    /**
     * Get employerIndustry
     *
     * @return string
     */
    public function getEmployerIndustry()
    {
        return $this->employer_industry;
    }

    /**
     * Set employerType
     *
     * @param string $employerType
     *
     * @return Employees
     */
    public function setEmployerType($employerType)
    {
        $this->employer_type = $employerType;

        return $this;
    }

    /**
     * Get employerType
     *
     * @return string
     */
    public function getEmployerType()
    {
        return $this->employer_type;
    }
}
