<?php

namespace Nfq\Weather;

use Nfq\Weather\OpenWeatherMapWeatherProvider;
use Nfq\Weather\YahooWeatherProvider;

class DelegatingWeatherProvider {

    private $providers;
    private $providerTitle;
    private $city;
    private $temperature;

    public function __construct($providers)
    {
        $this->providers = $providers;
    }

    public function foo ()
    {
        foreach ($this->providers as $provider) {
            try {
                $this->setProviderTitle($provider);
                $this->setCity($provider);
                $this->setTemperature($provider);

                echo $this->messageText();
            } catch (\Exception $e) {}
        }
    }

    private function messageText () : string
    {
        return $this->providerTitle . 'Currently in ' . $this->city . ' is ' . $this->temperature . '°C' . PHP_EOL;
    }

    private function setProviderTitle ($provider)
    {
        $this->providerTitle = $provider->getProviderName();
    }

    private function setCity ($provider)
    {
        $this->city = $provider->fetchCity();
    }

    private function setTemperature ($provider)
    {
        $this->temperature = $provider->fetchTemperature();
    }
}