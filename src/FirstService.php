<?

namespace Php\Ood;

use GuzzleHttp\Client;

class FirstService
{
    const URL = "https://www.metaweather.com/api/location/";

    public function __construct($client = null)
    {
        $this->client = $client ?? new Client();
    }

    public function getCityId($city)
    {
        $url = self::URL . 'search/?query=' . $city;
        $res = $this->client->get($url);
        $data = json_decode($res->getBody());
        return $data[0]->woeid;
    }

    public function getWeather($city)
    {
        $cityWoeid = $this->getCityId($city);
        $url = self::URL .  $cityWoeid . '/';
        $res = $this->client->get($url);
        $data = json_decode($res->getBody(), true);
        $weather = $data["consolidated_weather"][0];

        return [ "temp" => $weather['the_temp'], "wind_speed" => $weather['wind_speed']];
    }
}
