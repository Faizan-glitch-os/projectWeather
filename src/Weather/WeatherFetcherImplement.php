<?php

namespace App\Weather;

interface WeatherFetcherImplement
{
    public function fetch(string $city): WeatherInfo;
}
