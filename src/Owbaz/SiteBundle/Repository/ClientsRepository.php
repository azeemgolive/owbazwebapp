<?php

namespace Owbaz\SiteBundle\Repository;

/**
 * ClientsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientsRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllClients()
    {
         $total_record = $this->getEntityManager()
                ->createQuery('SELECT b FROM OwbazSiteBundle:Clients b');
        try {
            return $total_record->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
            
}
