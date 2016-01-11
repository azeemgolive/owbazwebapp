<?php

namespace Owbaz\EmployerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity(repositoryClass="Owbaz\EmployerBundle\Repository\EmployeesRepository")
 * @ORM\Table(name="jobsite_employees")
 */
class Employees
{
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
     * @var string
     *
     * @ORM\Column(name="company_description", type="string", length=255)
     */
    private $companyDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="text")
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
}

