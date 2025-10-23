<?php

namespace App\Weather;

use App\Weather\WeatherFetcherImplement;
use App\Weather\WeatherInfo;

class FakeWeatherFetcher implements WeatherFetcherImplement
{
    public function fetch(string $city): WeatherInfo
    {
        $type = ['sunny', 'cloudy', 'snowy', 'stormy'];
        $randomTemp = rand(1, 270);
        return new WeatherInfo($city, $randomTemp, $type[array_rand($type)]);
    }
}
