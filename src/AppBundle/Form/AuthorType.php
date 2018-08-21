<?php

namespace AppBundle\Form;

use AppBundle\Entity;
use AppBundle\Helper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name')
            ->add('birthDate', null, ['years' => range(date('Y'), 1700)])
            ->add('gender', ChoiceType::class, [
                'choices' => Entity\Author::GENDERS,
                'choice_label' => function($value) {
                    return Helper\Author::gender($value);
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Entity\Author::class
        ]);
    }

    public function getBlockPrefix() {
        return 'appbundle_author';
    }
}