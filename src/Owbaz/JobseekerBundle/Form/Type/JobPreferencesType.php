<?php

namespace Owbaz\JobseekerBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class JobPreferencesType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder->add('description');               
        $builder ->add('country', 'entity', array(
                    'class' => 'OwbazSiteBundle:Countries',
                    'expanded' => true,
                    'multiple' => true,
                    'property' => 'country_name',
                ));
        $builder ->add('jobcategory', 'entity', array(
            'class' => 'OwbazSiteBundle:JobsCategories',
            'expanded' => true,
            'multiple' => true,
            'property' => 'job_category_name',
        ));
            
    }

     public function getDefaultOptions(array $options)
     {
             return array(
            'data_class' => 'Owbaz\JobseekerBundle\Entity\JobPreferences');
      } 
 

    
    public function getName()
    {
        return 'job_Preferences';
    }

    
}

?>
