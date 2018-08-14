<?php

namespace AppBundle\Entity;

class Book
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var \DateTime */
    private $publicationDate;

    /** @var \DateTime */
    private $catalogDate;

    /** @var float */
    private $rating;

    /** @var int */
    private $genre;

    /** @var int */
    private $author;

    /**
     * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     * Короткая запись Entity. Это эксперимент! В реальном проекте я согласую стиль.
     * Оцените наглядность. Если один из сеттеров/геттеров меняется от выносится отдельно
     */

    public function getId()              : int {return $this->id;}
    public function getName()            : ? string {return $this->name;}
    public function getPublicationDate() : ? \DateTime {return $this->publicationDate;}
    public function getCatalogDate()     : ? \DateTime {return $this->catalogDate;}
    public function getRating()          : ? float {return $this->rating;}
    public function getGenre()           : ? int {return $this->genre;}
    public function getAuthor()          : ? string {return $this->author;}

    public function setName(string $name)                          : Book {$this->name = $name; return $this;}
    public function setPublicationDate(\DateTime $publicationDate) : Book {$this->publicationDate = $publicationDate; return $this;}
    public function setCatalogDate(\DateTime $catalogDate)         : Book {$this->catalogDate = $catalogDate;return $this;}
    public function setRating(float $rating = null)                : Book {$this->rating = $rating; return $this;}
    public function setGenre(int $genre)                           : Book {$this->genre = $genre;return $this;}
    public function setAuthor(string $author)                      : Book {$this->author = $author;return $this;}
}

