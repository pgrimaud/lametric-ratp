<?php

use Lametric\{Api, Icon, Response, Transport, UpdateException};

require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/parameters.php';

Sentry\init(['dsn' => $config['sentry_key']]);

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $transport = new Transport($parameters);
    $transport->validateParameters();
    $transport->setLine();

    //prepare ressource
    $api = new Api($transport);
    $api->createUrltoCall();

    //data from api
    $client = new GuzzleHttp\Client();
    $body   = $client->get($api->getUrlToCall())->getBody();

    //get icon linked to the line
    $icon = new Icon($transport);

    //prepare response
    $response = new Response();
    $response->setIcon($icon);
    $response->setBody($body);

    echo $response->returnResponse();

} catch (Exception $e) {
    if ($e instanceof UpdateException) {
        $response = new Response();
        echo $response->updateError();
    } else {
        $response = new Response();
        echo $response->returnError();
    }
}