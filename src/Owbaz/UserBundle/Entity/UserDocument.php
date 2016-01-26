<?php

namespace Owbaz\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    private $documentName;

    /**
     * @var text
     *
     * @ORM\Column(name="document_description", type="text")
     */
    private $documentDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="document_size", type="string", length=255)
     */
    private $documentSize;

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
    private $isCv;



    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;


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
     * Set documentName
     *
     * @param string $documentName
     *
     * @return UserDocument
     */
    public function setDocumentName($documentName)
    {
        $this->documentName = $documentName;

        return $this;
    }

    /**
     * Get documentName
     *
     * @return string
     */
    public function getDocumentName()
    {
        return $this->documentName;
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
        $this->documentDescription = $documentDescription;

        return $this;
    }

    /**
     * Get documentDescription
     *
     * @return string
     */
    public function getDocumentDescription()
    {
        return $this->documentDescription;
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
        $this->documentSize = $documentSize;

        return $this;
    }

    /**
     * Get documentSize
     *
     * @return string
     */
    public function getDocumentSize()
    {
        return $this->documentSize;
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
        $this->isCv = $isCv;

        return $this;
    }

    /**
     * Get isCv
     *
     * @return string
     */
    public function getIsCv()
    {
        return $this->isCv;
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


    public function getAbsolutePath()
    {
        return null === $this->documentName
            ? null
            : $this->getUploadRootDir().'/'.$this->documentName;
    }

    public function getWebPath()
    {
        return null === $this->documentName
            ? null
            : $this->getUploadDir().'/'.$this->documentName;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/owbaz/users_documents';
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to

        $this->setDocumentName($this->file);

        $this->file->move(
            $this->getUploadRootDir(),
            $this->file->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->file->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**W
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
}
