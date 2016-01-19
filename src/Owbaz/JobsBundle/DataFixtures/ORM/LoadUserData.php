<?php

namespace Owbaz\JobsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Owbaz\UserBundle\Entity\User;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;


class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
         
        $fixturesPath = realpath(dirname(__FILE__) . '/../fixtures');
        $fixtures = Yaml::parse(file_get_contents($fixturesPath . '/user.yml'));
        foreach ($fixtures['users'] as $user_key => $user_values) {             
            $entity = new User();            
            $entity->setFirstName(ucwords($user_values['first_name']));
            $entity->setLastName(ucwords($user_values['last_name']));                        
            $entity->setEmail($user_values['email']);
             $entity->setUserType($user_values['user_type']);
            $entity->setGender($user_values['gender']);
            $entity->setCreatedAt(new \DateTime('now'));
            $entity->setUpdatedAt(new \DateTime('now'));
            $entity->setPassword(md5($user_values['password']));                              
            $manager->persist($entity);
            $manager->flush(); 
        }
    }
    
    

    


    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 3; // the order in which fixtures will be loaded
    }

}

