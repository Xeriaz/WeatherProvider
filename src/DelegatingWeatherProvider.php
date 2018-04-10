<?php

namespace Nfq\Weather;

use Nfq\Weather\OpenWeatherMapWeatherProvider;
use Nfq\Weather\YahooWeatherProvider;

class DelegatingWeatherProvider implements WeatherInterface {

    private $providers;

    public function __construct($providers)
    {
        $this->providers = $providers;

    }

    public function foo()
    {
        // Vilnius Coordinates
        $location = new Location(54.687157, 25.279652);

        foreach ($this->providers as $provider) {
            try {
                $weatherObj = $provider->fetch($location);

                if (!$weatherObj){
                    return;
                }

                echo 'Currently temperature is: ' . $weatherObj->getTemperature() . PHP_EOL;
                return;

            } catch (\Exception $e) {}
        }
    }

    public function fetch(Location $location): Weather
    {
        // TODO: Implement fetch() method.
    }

}