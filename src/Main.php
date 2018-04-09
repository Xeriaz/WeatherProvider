<?php

namespace Nfq\Weather;

use Nfq\Weather\Location;

require_once '../vendor/autoload.php';

// Vilnius Coordinates
$location = new Location(54.687157, 25.279652);

$OpenWeatherMapWP = new OpenWeatherMapWeatherProvider();
$YahooWP = new YahooWeatherProvider();

$OpenWeatherMapWP->fetch($location);
$YahooWP->fetch($location);

$providers = [$OpenWeatherMapWP, $YahooWP];

$delegating = new DelegatingWeatherProvider($providers);

$delegating->foo();

