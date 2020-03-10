<?php

namespace App\Trip;

use App\Exception\UserNotLoggedInException;
use App\User\User;
use App\User\UserSession;

class TripService
{
    /**
     * @param User $user
     * @return Trip[]|array
     * @throws UserNotLoggedInException
     */
    public function getTripsByUser(User $user) {
        $tripList = [];
        $loggedUser = UserSession::getInstance()->getLoggedUser();
        $isFriend = false;
        if ($loggedUser != null) {
            foreach ($user->getFriends() as $friend) {
                if ($friend == $loggedUser) {
                    $isFriend = true;
                    break;
                }
            }
            if ($isFriend) {
                $tripList = TripDAO::findTripsByUser($user);
            }
            return $tripList;
        } else {
            throw new UserNotLoggedInException();
        }
    }
}
