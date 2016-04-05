<?php

require_once __DIR__ . '/vendor/autoload.php';

use Lametrics\Ratp;

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $transport = new Lametrics\Ratp\Transport($parameters);
    $transport->validateParameters();
    $transport->setLine();

    //prepare ressource
    $api = new Lametrics\Ratp\Api($transport);
    $api->createUrltoCall();

    //data from api
    $client = new GuzzleHttp\Client();
    $body = $client->get($api->getUrlToCall())->getBody();

    //get icon linked to the line
    $icon = new Lametrics\Ratp\Icon($transport);

    //prepare response
    $response = new Lametrics\Ratp\Response();
    $response->setIcon($icon);
    $response->setBody($body);

    echo $response->returnResponse();

} catch (Exception $e) {
    $response = new Lametrics\Ratp\Response();
    echo $response->returnError();
}