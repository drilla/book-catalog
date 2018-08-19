<?php

namespace AppBundle\Repository;

class BookRepository extends \Doctrine\ORM\EntityRepository
{
    /** @return  Book[] */
    public function findLatest(int $count = 1) : array {
        return $this->createQueryBuilder('book')
            ->select()
            ->orderBy('book.id', 'Desc')
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }
}
