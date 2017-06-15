<?php
require_once __DIR__ . '/vendor/autoload.php';

use Lametric\Ratp;

try {
    //sanitize parameters
    $parameters = array_map('htmlspecialchars', $_GET);

    //set init parameters
    $transport = new Lametric\Ratp\Transport($parameters);
    $transport->validateParameters();
    $transport->setLine();

    //prepare ressource
    $api = new Lametric\Ratp\Api($transport);
    $api->createUrltoCall();

    //data from api
    $client = new GuzzleHttp\Client();
    $body   = $client->get($api->getUrlToCall())->getBody();

    //get icon linked to the line
    $icon = new Lametric\Ratp\Icon($transport);

    //prepare response
    $response = new Lametric\Ratp\Response();
    $response->setIcon($icon);
    $response->setBody($body);

    echo $response->returnResponse();

} catch (Exception $e) {

    if ($e instanceof Ratp\UpdateException) {
        $response = new Lametric\Ratp\Response();
        echo $response->updateError();
    } else {
        $response = new Lametric\Ratp\Response();
        echo $response->returnError();
    }
}