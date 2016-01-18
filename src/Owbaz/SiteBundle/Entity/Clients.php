<?php

namespace Owbaz\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Owbaz\SiteBundle\Repository\ClientsRepository")
 * @ORM\Table(name="jobsite_clients")
 */
class Clients
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
     * @ORM\Column(name="client_name", type="string", length=255)
     */
    private $clientName;

    /**
     * @var string
     *
     * @ORM\Column(name="client_image", type="string", length=255)
     */
    private $clientImage;

    /**
     * @var string
     *
     * @ORM\Column(name="client_description", type="string", length=255)
     */
    private $clientDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $imageurl;


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
     * Set clientName
     *
     * @param string $clientName
     *
     * @return Clients
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientImage
     *
     * @param string $clientImage
     *
     * @return Clients
     */
    public function setClientImage($clientImage)
    {
        $this->clientImage = $clientImage;

        return $this;
    }

    /**
     * Get clientImage
     *
     * @return string
     */
    public function getClientImage()
    {
        return $this->clientImage;
    }

    /**
     * Set clientDescription
     *
     * @param string $clientDescription
     *
     * @return Clients
     */
    public function setClientDescription($clientDescription)
    {
        $this->clientDescription = $clientDescription;

        return $this;
    }

    /**
     * Get clientDescription
     *
     * @return string
     */
    public function getClientDescription()
    {
        return $this->clientDescription;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Clients
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
     * @return Clients
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
     * Set imageurl
     *
     * @param string $imageurl
     * @return Product
     */
    public function setImageurl($imageurl)
    {
        $this->imageurl = $imageurl;
    
        return $this;
    }

    /**
     * Get imageurl
     *
     * @return string 
     */
    public function getImageurl()
    {
        return $this->clientImage;
    }
    
    
    public function getAbsolutePath()
    {
        return null === $this->clientImage
            ? null
            : $this->getUploadRootDir().'/'.$this->clientImage;
    }

    public function getWebPath()
    {
        return null === $this->clientImage
            ? null
            : $this->getUploadDir().'/'.$this->clientImage;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads/owbaz/clients';
    }
}

