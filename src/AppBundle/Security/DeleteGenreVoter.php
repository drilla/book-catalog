<?php

namespace AppBundle\Security;

use AppBundle\Entity\Genre;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

/**
 * отказ в удалении жанра если есть книги
 */
class DeleteGenreVoter extends Voter
{
    protected function supports($attribute, $subject) {
        if ($attribute !== 'delete') return false;
        if (!$subject instanceof Genre) return false;

        return true;
    }

    /**
     * @param Genre $subject
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token) {
        if ($subject->getBooks()->count()) return false;

        return true;
    }
}