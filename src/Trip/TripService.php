<?php

namespace App\Trip;

use App\Exception\UserNotLoggedInException;
use App\User\User;
use App\User\UserSession;
use function in_array;

class TripService
{
    /**
     * @param User $user
     * @return Trip[]|array
     * @throws UserNotLoggedInException
     */
    public function getTripsByUser(User $user)
    {
        $loggedUser = $this->getLoggedUser();
        if ($loggedUser == null) {
            throw new UserNotLoggedInException();
        }

        $tripList = in_array($loggedUser, $user->getFriends()) ?
            $this->findTripsByUser($user) : [];
        return $tripList;
    }

    /**
     * @return User|null
     */
    protected function getLoggedUser()
    {
        return UserSession::getInstance()->getLoggedUser();
    }

    /**
     * @param User $user
     * @return Trip[]
     */
    protected function findTripsByUser(User $user)
    {
        return TripDAO::findTripsByUser($user);
    }
}
