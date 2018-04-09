<?php

namespace Nfq\Weather;

interface WeatherInterface {

    public function fetch(Location $location): Weather;

}