<?php

namespace Nfq\Weather;

class YahooWeatherProvider implements WeatherInterface
{
    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function fetchTemperature(): float
    {
        return $this->location->getTemperature();
    }

    public function fetchCity(): string
    {
        return $this->location->getCity();
    }

    public function getProviderName(): string
    {
        return 'Yahoo WP: ';
    }

}