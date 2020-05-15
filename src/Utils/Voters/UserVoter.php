<?php

namespace App\Utils\Voters;

use App\Entity\AppUser;
use App\Entity\AUser;
use App\Entity\UserBackOffice;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class UserVoter extends Voter
{

    private const VIEW = 'view';
    private const EDIT = 'edit';

    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject): bool
    {

        if (!in_array($attribute, array(self::VIEW, self::EDIT), true)) {
            return false;
        }

        if (!$subject instanceof AppUser) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        $userConnected = $token->getUser();

        if (!$userConnected instanceof AUser) {
            return false;
        }
        if ($this->security->isGranted(UserBackOffice::ROLE_BO_ADMIN)) {
            return true;
        }
        /** @var AppUser $buyerUpdate */
        $buyerUpdate = $subject;

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($buyerUpdate, $userConnected);
            case self::EDIT:
                return $this->canEdit($buyerUpdate, $userConnected);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(AppUser $buyerUpdate, AUser $userConnected): bool
    {
        return $this->canEdit($buyerUpdate, $userConnected);
    }

    private function canEdit(AppUser $buyerUpdate, AUser $userConnected): bool
    {
        return $buyerUpdate === $userConnected;
    }
}
