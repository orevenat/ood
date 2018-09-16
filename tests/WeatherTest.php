<?php

namespace Php\Ood\Tests;

use \PHPUnit\Framework\TestCase;
use \Php\Ood\Weather;
use \GuzzleHttp\ClientInterface;
use \GuzzleHttp\Client;
use \Psr\Http\Message\ResponseInterface;

class WeatherTest extends TestCase
{

    public function testGetLocation()
    {
        $data = [
            "as" => "AS41682 JSC ER-Telecom Holding",
            "city" => "Tyumen",
            "country" => "Russia",
            "countryCode" => "RU",
            "isp" => "JSC ER-Telecom Holding",
            "lat" => "57.1522",
            "lon" => "65.5272",
            "org" => "JSC ER-Telecom Holding Tyumen' branch",
            "query" => "188.186.18.255",
            "region" => "TYU",
            "regionName" => "Tyumen’ Oblast",
            "status" => "success",
            "timezone" => "Asia/Yekaterinburg",
            "zip" => "625059"
        ];

        $ip = "188.186.18.255";

        $location = new Location($this->createStub($data));

        $this->assertEquals($data, $location->getLocationData($ip));
    }

    public function createStub($default)
    {
        $bodyStub = $this->createMock(ResponseInterface::class);
        $bodyStub->method('getBody')
            ->willReturn(json_encode($default));

        $requestStub = $this->createMock(Client::class);
        $requestStub->method('__call')
            ->with(
                $this->equalTo('get')
            )
            ->willReturn($bodyStub);

        return $requestStub;
    }
}
