<?php

namespace AppBundle\Helper;

class Author
{
    public static function gender(string $gender) : string {
        switch ($gender) {
            case \AppBundle\Entity\Author::GENDER_MALE : return 'Мужчина';
            case \AppBundle\Entity\Author::GENDER_FEMALE : return 'Женщина';
            default : return '';
        }
    }
}