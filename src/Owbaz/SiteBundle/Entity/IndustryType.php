<?php

namespace Owbaz\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndustryType
 *
 * @ORM\Table(name="industry_type")
 * @ORM\Entity(repositoryClass="Owbaz\SiteBundle\Repository\IndustryTypeRepository")
 */
class IndustryType
{
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
}

