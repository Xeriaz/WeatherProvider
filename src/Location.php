<?php

namespace Nfq\Weather;

class Location
{
    private $latitude;
    private $longitude;

    function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLat(): float
    {
        return $this->latitude;
    }

    public function getLon(): float
    {
        return $this->longitude;
    }

}