<?

namespace Php\Ood;

use Illuminate\Support\Collection;
use GuzzleHttp\Client;

class Location
{
    private $ip;
    private $data;

    public function __construct($ip)
    {
        $this->ip = $ip;
        $this->setLocation();
    }

    public function setLocation()
    {
        $client = new Client();
        $url = "http://ip-api.com/json/" . $this->ip;

        $res = $client->request('GET', $url);

        $this->data = collect(json_decode($res->getBody()));
    }

    public static function getLocationData($ip)
    {
        $location = new Location($ip);
        $location->setLocation();

        return $location->getLocation();
    }

    public function getLocation()
    {
        return $this->data;
    }
}
