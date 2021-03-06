<?php

namespace Owbaz\UserBundle\Repository;

/**
 * UserDocumentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserDocumentRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllDocuments($user_id)
    {
        $total_record = $this->getEntityManager()
        ->createQuery("
            SELECT b FROM OwbazUserBundle:UserDocument b
            JOIN b.users ps
            WHERE ps.id = :user_id "
    )->setParameters(array('user_id' => $user_id));
        try {
            return $total_record->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
