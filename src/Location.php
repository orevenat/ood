<?

namespace Php\Ood;

use GuzzleHttp\Client;

class Location
{
    private $data;
    private $client;

    public function __construct($client = null)
    {
        if (!isset($client)) {
            $this->client = new Client();
        } else {
            $this->client = $client;
        }
    }

    public function getLocationData($ip)
    {
        $url = "http://ip-api.com/json/" . $ip;
        $res = $this->client->request('GET', $url);
        $this->data = json_decode($res->getBody(), true);

        return $this->data;
    }
}
