<?php

namespace App\Trip;

use App\User\User;
use App\Exception\DependentClassCalledDuringUnitTestException;

class TripDAO
{
    /**
     * @param User $user
     * @return Trip[]
     */
    public static function findTripsByUser(User $user)
    {
        throw new DependentClassCalledDuringUnitTestException('TripDAO should not be invoked on an unit test.');
    }
}
