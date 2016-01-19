<?php

namespace Owbaz\UserBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployerType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email');
        $builder->add('password','password');
        $builder->add('company_name');
        $builder ->add('industry_type', 'entity', array(
            'class' => 'OwbazSiteBundle:Industries',
            'expanded' => false,
            'multiple' => false,
            'property' => 'industryName',
        ));
        $builder->add('contact_person');
        $builder->add('user_type','hidden',array('data' => 'employer'));
        $builder->add('company_description');
        $builder->add('address');
        $builder ->add('country', 'entity', array(
                    'class' => 'OwbazSiteBundle:Countries',
                    'expanded' => false,
                    'multiple' => false,
                    'property' => 'country_name',
                )); 
        $builder->add('company_website');
            
    }

     public function getDefaultOptions(array $options)
     {
             return array(
            'data_class' => 'Owbaz\UserBundle\Entity\User');
      } 
 

    
    public function getName()
    {
        return 'user';
    }

    
}

?>
