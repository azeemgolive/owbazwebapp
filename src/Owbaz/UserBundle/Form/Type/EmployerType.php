<?php

namespace Owbaz\UserBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployerType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('email');
        $builder->add('gender', 'choice', array('choices'=> array('M'=>'Male','F'=>'Female')));       
        $builder->add('mobile_number');
        $builder->add('address');
        $builder ->add('country', 'entity', array(
                    'class' => 'OwbazSiteBundle:Countries',
                    'expanded' => false,
                    'multiple' => false,
                    'property' => 'name',
                ));           
        $builder->add('user_education', 'choice', array('choices'=> array('Primary'=>'Primary','High School'=>'High School','Diploma'=>'Diploma','Associates'=>'Associates','Bachelors'=>'Bachelors','Masters'=>'Masters','PhD'=>'PhD','Other'=>'Other')));
        $builder->add('user_experience', 'choice', array('choices'=> array('0-2'=>'0-2','3-5'=>'3-5','6-8'=>'6-8','9-11'=>'9-11','12-14'=>'12-14','15-17'=>'15-17','18-above'=>'18-above')));
        $builder->add('password');
            
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
