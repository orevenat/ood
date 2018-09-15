<?

namespace Php\Ood;

use GuzzleHttp\Client;

class Location
{
    private $client;

    public function __construct($client = null)
    {
        $this->client = $client ?? new Client();
    }

    public function getLocationData($ip)
    {
        $url = "http://ip-api.com/json/" . $ip;
        $res = $this->client->request('GET', $url);
        $data = json_decode($res->getBody(), true);

        return $data;
    }
}
