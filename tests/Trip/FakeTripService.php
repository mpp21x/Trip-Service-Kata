<?php


namespace Test\Trip;


use App\Trip\TripService;
use App\User\User;


class FakeTripService extends TripService
{
    /** @var User|null */
    private $loggedUser;
    private $trips;

    public function __construct($user = null, $trips = null)
    {
        $this->loggedUser = $user;
        $this->trips = $trips;
    }

    protected function getLoggedUser()
    {
        return $this->loggedUser;
    }

    protected function findTripsByUser(User $user)
    {
        return $this->trips;
    }
}

