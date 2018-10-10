<?php

namespace Lametric\Ratp;

class Api
{
    const API_URL = 'https://api-ratp.pierre-grimaud.fr/v3';

    /**
     * @var string
     */
    private $urlToCall;

    /**
     * @var Transport
     */
    private $transport;

    /**
     * Api constructor.
     * @param Transport $transport
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public function createUrlToCall()
    {
        $this->urlToCall = self::API_URL . '/schedules/'
            . strtolower($this->transport->getType()) . 's/'
            . strtolower($this->transport->getIdLine()) . '/'
            . strtolower($this->transport->getStation()) . '/'
            . strtoupper($this->transport->getDestination());
    }

    /**
     * @return string
     */
    public function getUrlToCall()
    {
        return (string)$this->urlToCall;
    }
}
