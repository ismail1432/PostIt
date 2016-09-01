<?php

namespace PostIt\AnnounceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use PostIt\UserBundle\Form\UserType;


class AnnounceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',          TextType::class)
            ->add('content',        TextareaType::class)
            ->add('city',           TextType::class)
            ->add('street',         TextType::class)
            ->add('company',        TextType::class)
            ->add('date',           DateTimeType::class)
            ->add('published',      CheckboxType::class, array('required' => false))
            ->add('user',           UserType::class)
            ->add('save',           SubmitType::class);
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PostIt\AnnounceBundle\Entity\Announce'
        ));
    }
}
