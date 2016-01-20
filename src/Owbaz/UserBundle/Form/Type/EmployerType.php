<?php

namespace Owbaz\UserBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class EmployerType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email');
        $builder->add('password', 'repeated', array(
            'first_name' => 'password',
            'second_name' => 'confirm',
            'type' => 'password',
            'invalid_message' => 'The password fields must match.',
        ));

        $builder->add('company_name');

        $builder ->add('industry', 'entity', array(
            'class' => 'OwbazSiteBundle:Industries',
            'expanded' => false,
            'multiple' => false,
            'property' => 'industry_name',
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

        $builder->add('phone_number');
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
