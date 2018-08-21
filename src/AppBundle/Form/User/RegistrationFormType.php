<?php

namespace AppBundle\Form\User;

use Symfony\Component\Form\FormBuilderInterface;
use \FOS\UserBundle\Form\Type\RegistrationFormType as ParentForm;

class RegistrationFormType extends ParentForm
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name');
    }

    public function getParent() {
        return ParentForm::class;
    }

    public function getBlockPrefix() {
        return 'app_user_registration';
    }
}
