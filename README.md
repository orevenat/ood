# Location

### Usage Instructions

```PHP
$ip = "188.186.18.255";
$location = new Location;
$location->getLocationData($ip)
```

Return array.

# Weather CLI and Class

### Usage Instructions

Пример использования:
```PHP
$customService = ['CustomService' => CustomClass::class];
$weather = new Weather($customService);
$info = $weather->getTownWheather('London', 'CustomService');
```

Пример использования CLI
```PHP
bin/weather London
bin/weather --service=SecondService London
```

Return temp and wind speed.
