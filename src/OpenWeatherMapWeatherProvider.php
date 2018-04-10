<?php

namespace Nfq\Weather;

class OpenWeatherMapWeatherProvider implements WeatherInterface
{
    private $BASE_URL = 'http://api.openweathermap.org/data/2.5/weather?id=524901&APPID=';
    private $appId;

    public function __construct(string $appId)
    {
        $this->appId = $appId;
    }

    public function fetch(Location $location): Weather
    {
        $url = $this->BASE_URL . $this->appId .
            $this->getWeatherByCoordQuery($location);

        //  TODO fix exception
        try {
            $json = file_get_contents($url);

            $phpObj = json_decode($json);

            $temp = floatval($phpObj->main->temp);
            return new Weather($temp);
        } catch (\Exception $e) { }
    }

    private function getWeatherByCoordQuery(Location $location): string
    {
        $lat = $location->getLat();
        $lon = $location->getLon();

        return '&weather&lat='. $lat .'&lon=' . $lon . '&units=metric';
    }

    public function setAppId($appId)
    {
        $this->appId = $appId;
    }
}
