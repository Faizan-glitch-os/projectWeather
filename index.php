<?php

use App\Weather\FakeWeatherFetcher;

require_once __DIR__ . '/inc/all.inc.php';

$fetcher = new FakeWeatherFetcher();
$result = $fetcher->fetch('Charsadda');
$now = new DateTime();
$weekDay = $now->format('l');
$monthDay = $now->format('j');


require_once __DIR__ . '/views/index.view.php';
