<?php

namespace Nfq\Weather;

class Location
{
    private $city;
    private $latitude;
    private $longitude;
    private $temperature;

    function __construct(string $city, float $latitude, float $longitude, float $temperature)
    {
        $this->city = $city;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->temperature = $temperature;
    }

    function printInfo() : void
    {
        echo 'City: ' . $this->city . ' Latitude: ' . $this->latitude . ' Longitude: ' . $this->longitude . PHP_EOL;
    }

    public function getTemperature() : float
    {
        return $this->temperature;
    }

    public function getCity() : string
    {
        return $this->city;
    }
}