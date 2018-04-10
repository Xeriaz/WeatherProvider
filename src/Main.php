<?php

namespace Nfq\Weather;

use Nfq\Weather\Location;

require_once '../vendor/autoload.php';

$OpenWeatherMapWP = new OpenWeatherMapWeatherProvider('c5fb386073ea22eb1f32d78dcdb0197d');
$YahooWP = new YahooWeatherProvider();

$providers = [$OpenWeatherMapWP, $YahooWP];

$delegating = new DelegatingWeatherProvider($providers);

$delegating->foo();

