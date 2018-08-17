<?php

namespace AppBundle\Form;

use AppBundle\Entity\Author;
use AppBundle\Entity\Book;
use AppBundle\Entity\Genre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name')
            ->add('publicationDate')
            ->add('rating')
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => function(Genre $genre) {
                    return $genre->getName();
                }
            ])
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => function(Author $author) {
                    return $author->getName();
                },
                'placeholder' => 'Выберите автора...'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Book::class
        ]);
    }

    public function getBlockPrefix() {
        return 'appbundle_book';
    }
}
