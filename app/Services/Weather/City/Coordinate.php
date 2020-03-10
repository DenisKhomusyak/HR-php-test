<?php

namespace App\Services\Weather\City;

/**
 * Class Coordinate
 * @package App\Services\Weather\City
 */
abstract class Coordinate
{
    /**
     * @var float
     */
    public $value;

    /**
     * Coordinate constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue() : float
    {
        return $this->value;
    }
}