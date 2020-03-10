<?php

namespace Test\Trip;


use App\Exception\UserNotLoggedInException;
use App\Trip\TripService;
use App\User\User;
use Mockery;
use PHPUnit\Framework\TestCase;


class TripServiceTest extends TestCase
{
    /*** @var TripService */
    private $tripService;

    /**
     * @test
     */
    public function throwExceptionWhenUserIsNotLoggedIn()
    {
        $this->expectException(UserNotLoggedInException::class);
        $user = Mockery::mock(User::class);
        $this->tripService->getTripsByUser($user);
    }

    protected function setUp(): void
    {
        $this->tripService = new FakeTripService();
    }
}
