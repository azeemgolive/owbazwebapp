<?php
namespace Owbaz\JobsBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Owbaz\SiteBundle\Entity\JobsCategories;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class LoadJobCategoriesData implements FixtureInterface{

     /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {       
        $fixturesPath = realpath(dirname(__FILE__). '/../fixtures');
        $fixtures     = Yaml::parse(file_get_contents($fixturesPath. '/job_categories.yml'));
        foreach ($fixtures['jobcategories'] as $key=>$values) {
           $brand = new JobsCategories();
           $brand->setJobCategoryName(ucwords($key));
           $brand->setIsActive("yes");
           $brand->setCreatedAt(new \DateTime('now'));
           $brand->setUpdatedAt(new \DateTime('now'));
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

