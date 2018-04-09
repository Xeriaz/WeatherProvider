<?php

namespace Nfq\Weather;

class OpenWeatherMapWeatherProvider implements WeatherInterface
{
    private $BASE_URL = 'http://api.openweathermap.org/data/2.5/weather?id=524901&APPID=';
    private $APPID = 'c5fb386073ea22eb1f32d78dcdb0197d';

    public function fetch(Location $location): Weather
    {
        $url = $this->BASE_URL . $this->APPID .
            $this->getWeatherByCoordQuery($location);

        $json = file_get_contents($url);

        $phpObj = json_decode($json);

        $temp = $phpObj->main->temp;

        return new Weather($temp);
    }

    private function getWeatherByCoordQuery(Location $location): string {
        $lat = $location->getLat();
        $lon = $location->getLon();

        return '&weather&lat='. $lat .'&lon=' . $lon . '&units=metric';
    }
}
