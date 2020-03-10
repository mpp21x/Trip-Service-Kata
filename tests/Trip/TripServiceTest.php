<?php

namespace Test\Trip;


use App\Exception\UserNotLoggedInException;
use App\Trip\Trip;
use App\Trip\TripService;
use App\User\User;
use Mockery;
use PHPUnit\Framework\TestCase;


class TripServiceTest extends TestCase
{
    /*** @var TripService */
    private $tripService;
    /**
     * @var User|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    private $user;

    /**
     * @test
     */
    public function throwExceptionWhenUserIsNotLoggedIn()
    {
        $this->expectException(UserNotLoggedInException::class);

        $this->tripService = new FakeTripService();
        $this->tripService->getTripsByUser($this->user);
    }

    /** @test */
    public function isNotTripsWhenLoggedUserIsNotFriend()
    {
        $this->tripService = new FakeTripService($this->createMockUser());

        $userWithoutAnyFriend = new User("");
        $this->user
            ->shouldReceive("getFriends")
            ->andReturn([$userWithoutAnyFriend]);
        $nullTrips = $this->tripService->getTripsByUser($this->user);

        $this->assertEmpty($nullTrips);
    }

    /** @test */
    public function isTripsWhenLoggedUserIsFriend()
    {
        $user = $this->createMockUser();
        $this->tripService = new FakeTripService($user, [$this->createMockTrip()]);

        $this->user
            ->shouldReceive("getFriends")
            ->andReturn([$user]);
        $trips = $this->tripService->getTripsByUser($this->user);
        $this->assertNotEmpty($trips);
    }

    protected function setUp(): void
    {
        $this->user = $this->createMockUser();
    }

    /**
     * @return User|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    protected function createMockUser()
    {
        return Mockery::mock(User::class);
    }

    /**
     * @return Trip|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    protected function createMockTrip()
    {
        return Mockery::mock(Trip::class);
    }
}
