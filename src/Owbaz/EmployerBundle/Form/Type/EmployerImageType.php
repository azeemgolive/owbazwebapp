<?php

namespace Owbaz\EmployerBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployerImageType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file');
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
