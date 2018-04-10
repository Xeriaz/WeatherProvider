<?php

namespace Nfq\Weather;

use Nfq\Weather\Location;

require_once '../vendor/autoload.php';

$OpenWeatherMapWP = new OpenWeatherMapWeatherProvider($argv[1]);
$YahooWP = new YahooWeatherProvider();

$providers = [$OpenWeatherMapWP, $YahooWP];

$delegating = new DelegatingWeatherProvider($providers);

$delegating->foo();

