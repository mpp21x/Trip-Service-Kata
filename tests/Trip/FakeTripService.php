<?php


namespace Test\Trip;


use App\Trip\TripService;
use App\User\User;


class FakeTripService extends TripService
{
    /** @var User|null */
    private $loggedUser;

    public function __construct($user = null)
    {
        $this->loggedUser = $user;
    }

    protected function getLoggedUser()
    {
        return $this->loggedUser;
    }


}

