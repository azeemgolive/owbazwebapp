<?php

namespace Owbaz\UserBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class DocumentType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file');
        $builder->add('documentDescription','textarea');
        $builder->add('isCv', 'choice', array('choices'=> array('yes'=>'Yes','no'=>'No')));


            
    }

     public function getDefaultOptions(array $options)
     {
             return array(
            'data_class' => 'Owbaz\UserBundle\Entity\UserDocument');
      } 
 

    
    public function getName()
    {
        return 'user';
    }

    
}

?>
