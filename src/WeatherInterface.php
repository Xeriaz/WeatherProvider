<?php

namespace Nfq\Weather;

interface WeatherInterface {

    public function fetchTemperature() : float;

    public function fetchCity() : string;

    public function getProviderName() : string;
}