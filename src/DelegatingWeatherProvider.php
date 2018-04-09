<?php

namespace Nfq\Weather;

use Nfq\Weather\OpenWeatherMapWeatherProvider;
use Nfq\Weather\YahooWeatherProvider;

class DelegatingWeatherProvider {

    private $providers;

    public function __construct($providers)
    {
        $this->providers = $providers;
    }

    public function foo ()
    {
        foreach ($this->providers as $provider) {
            // TODO
        }
    }

}