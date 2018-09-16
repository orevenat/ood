<?

namespace Php\Ood;

use GuzzleHttp\Client;

class Weather
{
    private $client;
    private $services = [
        'FirstService' => FirstService::class,
        'SecondService' => SecondService::class
    ];

    public function __construct($customService = null, $client = null)
    {
        if ($customService) {
            $this->services[] = $customService;
        }

        $this->client = $client ?? new Client();
    }

    public function getTownWheather($city, $serviceName = 'FirstService')
    {
        if (empty($serviceName)) {
            $serviceName = 'FirstService';
        }
        $service = new $this->services[$serviceName]($this->client);
        return $service->getWeather($city);
    }
}
