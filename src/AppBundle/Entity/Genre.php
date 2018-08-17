<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Genre
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var  Book[] */
    private $books;

    public function __construct() {
        $this->books = new ArrayCollection();
    }

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

    public function getBooks() : ArrayCollection {
        return $this->getBooks();
    }

    public function setBooks(ArrayCollection $books) : Genre {
        $this->books = $books;
        return $this;
    }
}