<?php

namespace App\User;

use App\Exception\DependentClassCalledDuringUnitTestException;

class UserSession
{
    /**
     * @var UserSession
     */
    private static $userSession;

    /**
     * @return UserSession
     */
    public static function getInstance()
    {
        if (null === static::$userSession) {
            static::$userSession = new UserSession();
        }

        return static::$userSession;
    }

    public function isUserLoggedIn(User $user)
    {
        throw new DependentClassCalledDuringUnitTestException(
            'UserSession.isUserLoggedIn() should not be called in an unit test'
        );
    }

    /**
     * @return User
     */
    public function getLoggedUser()
    {
        throw new DependentClassCalledDuringUnitTestException(
            'UserSession.getLoggedUser() should not be called in an unit test'
        );
    }

}
