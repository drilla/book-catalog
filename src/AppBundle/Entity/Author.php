<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Author
{
    const GENDER_MALE    = 'male';
    const GENDER_FEMALE  = 'female';

    const GENDERS = [
        self::GENDER_MALE,
        self::GENDER_FEMALE,
    ];

    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var \DateTime */
    private $birthDate;

    /** @var string */
    private $gender;

    /** @var Book[] */
    private $books;

    /**
     * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     * Короткая запись Entity. Это эксперимент! В реальном проекте я согласую стиль.
     * Оцените наглядность. Если один из сеттеров/геттеров меняется от выносится отдельно
     */

    public function getId()        : int {return $this->id;}
    public function getName()      : ? string {return $this->name;}
    public function getBirthDate() : ? \DateTime {return $this->birthDate;}
    public function getGender()    : ? string {return $this->gender;}

    /** Books[] */
    public function getBooks()     : ArrayCollection {return $this->books;}

    public function setName(string $name)              : Author {$this->name = $name; return $this;}
    public function setBirthDate(\DateTime $birthDate) : Author {$this->birthDate = $birthDate; return $this;}
    public function setGender(string $gender)          : Author {$this->gender = $gender; return $this;}
    public function setBooks(ArrayCollection $books)   : Author {$this->books = $books; return $this;}

    public function __construct() {
        $this->books = new ArrayCollection();
    }
}