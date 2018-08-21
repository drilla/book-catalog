<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    /** @var  string */
    protected $name ;

    protected $id;

    public function getName(): ? string {
        return $this->name;
    }

    public function setName(string $name): User {
        $this->name = $name;
        return $this;
    }
}