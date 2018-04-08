<?php

namespace Nfq\Weather;

use Nfq\Weather\Location;

require_once '../vendor/autoload.php';

// Generate locations list
$citiesArray = ['Alytus', 'Vilnius', 'Kaunas', 'Druskininkai', 'Klaipeda'];

$i = 0;
$locations = [];

foreach ($citiesArray as $city) {
    $locations[] = new Location($city, $i, $i, rand(10, 20));
    $i++;
}

$locationObject = '';
foreach ($locations as $loc) {
    if ($loc->getCity() === $argv[1]) {
        $locationObject = $loc;
        break;
    }
}

if ($locationObject === '') {
    echo 'City or coordinates does not exist';
    die;
}

$OpenWeatherMapWP = new OpenWeatherMapWeatherProvider($locationObject);
$YahooWP = new YahooWeatherProvider($locationObject);

$providers = [$OpenWeatherMapWP, $YahooWP];

$delegating = new DelegatingWeatherProvider($providers);

$delegating->foo();

