<?php

namespace Test\Trip;

use App\Trip\TripService;
use PHPUnit\Framework\TestCase;


class TripServiceTest extends TestCase
{
    /*** @var TripService */
    private $tripService;

    public function testGetTripsByUser()
    {
        // TODO 開始練習！
    }

    protected function setUp(): void
    {
        $this->tripService = new TripService;
    }
}
