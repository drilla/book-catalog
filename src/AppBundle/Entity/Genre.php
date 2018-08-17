<?php

namespace AppBundle\Entity;

class Genre
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    public function getId() : int {
        return $this->id;
    }

    public function setName(string $name) : Genre {
        $this->name = $name;

        return $this;
    }

    public function getName() : ? string {
        return $this->name;
    }
}