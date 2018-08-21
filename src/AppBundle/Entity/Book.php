<?php

namespace AppBundle\Entity;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

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

    /** @var Genre */
    private $genre;

    /** @var Author */
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
    public function getGenre()           : ? Genre {return $this->genre;}
    public function getAuthor()          : ? Author {return $this->author;}

    public function setName(string $name)                          : Book {$this->name = $name; return $this;}
    public function setPublicationDate(\DateTime $publicationDate) : Book {$this->publicationDate = $publicationDate; return $this;}
    public function setGenre(Genre $genre)                         : Book {$this->genre = $genre; return $this;}
    public function setAuthor(Author $author)                      : Book {$this->author = $author; return $this;}

    public function prePersist(LifecycleEventArgs  $eventArgs) {
        $this->catalogDate = new \DateTime();
    }

    public function getRating() : float {
        //todo remove
        return 8;
    }
}

