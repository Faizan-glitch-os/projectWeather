<?php

declare(strict_types=1);

namespace App\Weather;

use App\Weather\WeatherFetcherImplement;
use App\Weather\WeatherInfo;

class FakeWeatherFetcher implements WeatherFetcherImplement
{

    public function fetch(string $city): ?WeatherInfo
    {
        $fp = @fsockopen("ssl://downloads.codingcoursestv.eu", 443, $errno, $errstr, 30);
        if (!$fp) {
            return null;
            // echo "$errstr ($errno)<br />\n";
        } else {
            $out = "GET /056%20-%20php/weather/weather.php?" . http_build_query(['city' => $city]) . " HTTP/1.1\r\n";
            $out .= "Host: downloads.codingcoursestv.eu\r\n";
            $out .= "Connection: Close\r\n\r\n";
            fwrite($fp, $out);
            $response = [];
            while (!feof($fp)) {
                $response[] = fgets($fp, 128);
            }
            fclose($fp);
            $responseStr = implode($response);
            $splittedResponse = explode("\r\n\r\n", $responseStr);

            $result = preg_replace('/^39\s*|\s*0$/', '', $splittedResponse[1]);

            if (empty($result)) {
                return null;
            }
            $data = json_decode($result, true);

            if (empty($data['city']) || empty($data['temperature']) || empty($data['weather'])) {
                return null;
            }
            return new WeatherInfo($data['city'], $data['temperature'], $data['weather']);
        }
    }
}
