<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    /** @var  string */
    protected $name ;

    protected $id;

    /** @var  Image */
    protected $image;

    public function getName(): ? string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getImage(): ? Image {
        return $this->image;
    }

    public function setImage(? Image $image): self {
        $this->image = $image;
        return $this;
    }
}