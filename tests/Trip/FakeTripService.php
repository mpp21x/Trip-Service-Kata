<?php


namespace Test\Trip;


use App\Trip\TripService;
use App\User\User;

class FakeTripService extends TripService
{
    protected function getLoggedUser()
    {
        return null;
    }

}

