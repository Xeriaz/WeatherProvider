<?php

namespace Nfq\Weather;


class Weather
{
    private $temperature;

    public function __construct(float $temperature)
    {
        $this->temperature;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }
}