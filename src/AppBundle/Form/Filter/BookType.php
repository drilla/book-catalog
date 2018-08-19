<?php

namespace AppBundle\Form\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Форма для поиска и фильтрации книг
 */
class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('GET')
            ->add('genre', HiddenType::class);

    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver
            ->setDefault('csrf_protection' , false)
        ;
    }

    public function getBlockPrefix() {
        return 'book_filter';
    }
}
