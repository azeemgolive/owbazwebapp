<?php

namespace Owbaz\JobsBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EmployerJobType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder ->add('jobcategory', 'entity', array(
                    'class' => 'OwbazSiteBundle:JobsCategories',
                    'expanded' => false,
                    'multiple' => false,
                    'property' => 'job_category_name',
                ));
       $builder->add('job_type', 'choice', array('choices'=> array(''=>'Select Job Type','Full Time'=>'Full Time','Part Time'=>'Part Time','Contract'=>'Contract','Internship'=>'Internship','Temporary Employee'=>'Temporary Employee')));
       $builder->add('job_title');
       $builder->add('job_description');       
       $builder->add('job_salary');
       $builder->add('job_education', 'choice', array('choices'=> array('Primary'=>'Primary','High School'=>'High School','Diploma'=>'Diploma','Associates'=>'Associates','Bachelors'=>'Bachelors','Masters'=>'Masters','PhD'=>'PhD','Other'=>'Other')));
       $builder->add('job_experience', 'choice', array('choices'=> array('0-2'=>'0-2','3-5'=>'3-5','6-8'=>'6-8','9-11'=>'9-11','12-14'=>'12-14','15-17'=>'15-17','18-above'=>'18-above')));
       
       $builder ->add('country', 'entity', array(
                    'class' => 'OwbazSiteBundle:Countries',
                    'expanded' => false,
                    'multiple' => false,
                    'property' => 'country_name',
                ));

        $builder ->add('location', 'entity', array(
                    'class' => 'OwbazSiteBundle:Locations',
                    'expanded' => false,
                    'multiple' => false,
                    'property' => 'area_name',
                ));
        $builder->add('isActive', 'choice', array('choices'=> array('yes'=>'Yes','no'=>'No')));
            
    }

     public function getDefaultOptions(array $options)
     {
             return array(
            'data_class' => 'Owbaz\JobsBundle\Entity\Jobs');
      } 
 

    
    public function getName()
    {
        return 'jobs';
    }

    
}

?>
