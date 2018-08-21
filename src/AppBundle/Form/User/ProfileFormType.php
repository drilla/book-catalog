<?php

namespace AppBundle\Form\User;

use FOS\UserBundle\Form\Type\ProfileFormType as ParentProfile;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends ParentProfile
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->get('email')->setDisabled(true);
        $builder->get('username')->setDisabled(true);

        $builder->add('name');
        $builder->remove('current_password');
    }

    public function getParent() {
        return ParentProfile::class;
    }

    public function getBlockPrefix() {
        return 'app_user_profile';
    }
}