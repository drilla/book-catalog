<?php

namespace AppBundle\Form\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Форма для поиска и фильтрации книг
 */
class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('GET')
            ->add('genre', HiddenType::class, [
                'constraints' => [new Type(IntegerType::class)]
            ])
            ->add('author', HiddenType::class,  [
                'constraints' => [new Type(IntegerType::class)]
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver
            ->setDefault('csrf_protection' , false)
        ;
    }

    public function getBlockPrefix() {
        /**
         * Пустое имя для более удобного обращения из разметки
         */
        return '';
    }
}
