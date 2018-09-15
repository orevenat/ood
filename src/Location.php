<?

namespace Php\Ood;

use Illuminate\Support\Collection;

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
        $ch = curl_init();
        $url = "http://ip-api.com/json/" . $this->ip;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $this->data = collect(json_decode(curl_exec($ch)));
        curl_close($ch);
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
