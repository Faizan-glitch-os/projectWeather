<?php

use App\Weather\FakeWeatherFetcher;

require_once __DIR__ . '/inc/all.inc.php';

$fetcher = new FakeWeatherFetcher();
$result = $fetcher->fetch('Charsadda');

var_dump($result->type);


require_once __DIR__ . '/views/index.view.php';
