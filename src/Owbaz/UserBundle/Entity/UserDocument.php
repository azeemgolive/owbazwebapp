<?php

namespace Owbaz\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Owbaz\JobseekerBundle\ImageHelper;
/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Owbaz\UserBundle\Repository\UserDocumentRepository")
 * @ORM\Table(name="jobsite_user_document")
 * @ORM\HasLifecycleCallbacks()
 */
class UserDocument
{

    //-----------------------one to many relationship with User Document-----------------------------------------
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="documents")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id",onDelete="No Action")
     */
    protected $users;

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
     * @ORM\Column(name="document_name", type="string", length=255)
     */
    private $document_name;

    /**
     * @var text
     *
     * @ORM\Column(name="document_description", type="text")
     */
    private $document_description;

    /**
     * @var string
     *
     * @ORM\Column(name="document_size", type="string", length=255)
     */
    private $document_size;

    /**
     * @var datetime
     *
     * @ORM\Column(name="createdat", type="datetime")
     */
    private $CreatedAt;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updatedat", type="datetime")
     */
    private $UpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="is_cv", type="string", length=255)
     */
    private $is_cv;

    /**
     * @var string
     *
     * @ORM\Column(name="document_type", type="string", length=255)
     */
    private $DocumentType;



    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;


    

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
     * Set documentName
     *
     * @param string $documentName
     *
     * @return UserDocument
     */
    public function setDocumentName($documentName)
    {
        $this->document_name = $documentName;

        return $this;
    }

    /**
     * Get documentName
     *
     * @return string
     */
    public function getDocumentName()
    {
        return $this->document_name;
    }

    /**
     * Set documentDescription
     *
     * @param string $documentDescription
     *
     * @return UserDocument
     */
    public function setDocumentDescription($documentDescription)
    {
        $this->document_description = $documentDescription;

        return $this;
    }

    /**
     * Get documentDescription
     *
     * @return string
     */
    public function getDocumentDescription()
    {
        return $this->document_description;
    }

    /**
     * Set documentSize
     *
     * @param string $documentSize
     *
     * @return UserDocument
     */
    public function setDocumentSize($documentSize)
    {
        $this->document_size = $documentSize;

        return $this;
    }

    /**
     * Get documentSize
     *
     * @return string
     */
    public function getDocumentSize()
    {
        return $this->document_size;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return UserDocument
     */
    public function setCreatedAt($createdAt)
    {
        $this->CreatedAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return UserDocument
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->UpdatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->UpdatedAt;
    }

    /**
     * Set isCv
     *
     * @param string $isCv
     *
     * @return UserDocument
     */
    public function setIsCv($isCv)
    {
        $this->is_cv = $isCv;

        return $this;
    }

    /**
     * Get isCv
     *
     * @return string
     */
    public function getIsCv()
    {
        return $this->is_cv;
    }

    /**
     * Set users
     *
     * @param \Owbaz\UserBundle\Entity\User $users
     *
     * @return UserDocument
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
    
    
    
    //-------------------------------------------------
    //-------------- File Upload ---------------------
    //-------------------------------------------------
    
    public function uploadUserDocument() {
        // the file property can be empty if the field is not required
       if (null === $this->file) {
            return;
        }
        
        //$previous_image=$this->document_name;
        $ext = pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION);
        
        $this->document_name=uniqid() .'.'. $ext;
        $this->setDocumentType($ext);
        $file_size = $this->file->getSize();
        $this->setDocumentSize($file_size);
        $this->setDocumentName($this->document_name);    
        $this->file->move(
                $this->getUploadRootDir(), $this->document_name
        );
        
        //$this->resize_image();
        //if record is being updated, then delete previous images
        //if ($this->entity->getId())
           // $this->deleteCompanyImages($previous_image); 
        
        $this->file = null;
    }
//---------------------------------------------------
    
  public function getAbsolutePath()
    {
        return null === $this->document_name
            ? null
            : $this->getUploadRootDir().'/'.$this->document_name;
    }
//---------------------------------------------------
    public function getWebPath()
    {
        return null === $this->document_name
            ? null
            : $this->getUploadDir().'/'.$this->document_name;
    }
//---------------------------------------------------
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
//---------------------------------------------------
    protected function getUploadDir()
    {
        return 'uploads/owbaz/users/user_documents';
    }
    //---------------------------------------------------
    
 



    /**
     * Set documentType
     *
     * @param string $documentType
     *
     * @return UserDocument
     */
    public function setDocumentType($documentType)
    {
        $this->DocumentType = $documentType;

        return $this;
    }

    /**
     * Get documentType
     *
     * @return string
     */
    public function getDocumentType()
    {
        return $this->DocumentType;
    }
}
