<?php
namespace Owbaz\JobsBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Owbaz\SiteBundle\Entity\Industries;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class LoadIndustriesTypeData implements FixtureInterface{

     /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {       
        $fixturesPath = realpath(dirname(__FILE__). '/../fixtures');
        $fixtures     = Yaml::parse(file_get_contents($fixturesPath. '/industry_type.yml'));
        foreach ($fixtures['industriestype'] as $key=>$values) {
           $brand = new Industries();
           $brand->setIndustryName(ucwords($key));
           $manager->persist($brand);
           $manager->flush();
        }
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
    
}

