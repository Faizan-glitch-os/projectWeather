<?php

namespace App\Weather;

use App\Weather\WeatherFetcherImplement;
use App\Weather\WeatherInfo;

class FakeWeatherFetcher implements WeatherFetcherImplement
{
    public function fetch(string $city): WeatherInfo
    {
        return new WeatherInfo($city, 50, 'sunny');
    }
}
