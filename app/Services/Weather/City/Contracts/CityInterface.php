<?php

namespace App\Services\Weather\City\Contracts;

use App\Services\Weather\City\Coordinate;

/**
 * Interface CityInterface
 * @package App\Services\Weather\City
 */
interface CityInterface
{
    public function getName() : string ;

    public function setLat(Coordinate $coordinate) : void ;

    public function getLat() : float ;

    public function setLon(Coordinate $coordinate) : void ;

    public function getLon() : float ;
}