<?php
namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('attachment', 'file');
        $builder->add('body', 'textarea');
    }

    public function getName() {
        return 'post';
    }
}