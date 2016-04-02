<?php

ini_set('display_errors', 0);

$images = [
    'default'   => 'i2600',
    'metro1'    => 'i2605',
    'metro2'    => 'i2606',
    'metro3'    => 'i2608',
    'metro3b'   => 'i2607',
    'metro4'    => 'i2609',
    'metro5'    => 'i2610',
    'metro6'    => 'i2590',
    'metro7'    => 'i2611',
    'metro7b'   => 'i2612',
    'metro8'    => 'i2613',
    'metro9'    => 'i2614',
    'metro10'   => 'i2615',
    'metro11'   => 'i2617',
    'metro12'   => 'i2618',
    'metro13'   => 'i2616',
    'metro14'   => 'i2619',
    'rera'      => 'i2620',
    'rerb'      => 'i2621'
];

$transportTypes = [
    'metro',
    'rer',
    'tramway'
];

$line           = $_GET['line'];
$destination    = $_GET['destination'];
$station        = $_GET['station'];

$icon = isset($images[$line]) ? $images[$line] : $images['default'];

foreach($transportTypes as $transportType){
    if(strpos($line, $transportType) !== false){
        $type = $transportType;
        $line = str_replace($transportType, '', $line);
        break;
    }
}

$urlToCall = 'http://api-ratp.pierre-grimaud.fr/v2/'.$type.'s/'.$line.'/stations/'.$station.'?destination='.$destination;

$file = file_get_contents($urlToCall);
$json = json_decode($file);

$responseDestination = $json->response->informations->destination->name;
$responseStation = $json->response->informations->station->name;

$responseSchedule = $json->response->schedules[0]->message;

$data = [
    'frames' => [
        [
            'index' => 0,
            'text'  => 'Prochain train pour '.$responseDestination,
            'icon'  => $icon
        ],
        [
            'index' => 1,
            'text'  => $responseSchedule,
            'icon'  => $icon
        ]
    ]
];

echo json_encode($data, JSON_PRETTY_PRINT);