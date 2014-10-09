<?php
namespace Blogger\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Email','email', array(
            'required' => true,
            'trim' => true,
            'attr' => array(
                'placeholder' => 'example@aol.com',
            )
        ));
        $builder->add('Username','text', array(
            'required' => true,
            'trim' => true,
            'attr' => array(
                'placeholder' => 'adminda',
            )
        ));
        $builder->add('Password','password', array(
            'required' => true,
            'attr' => array(
                'placeholder' => '**********',
            )
        ));
        $builder->add('Register', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Blogger\Userbundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'registration';
    }
}