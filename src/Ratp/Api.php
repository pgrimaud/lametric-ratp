<?php
namespace Lametric\Ratp;

class Api
{
    const API_URL = 'http://api-ratp.pierre-grimaud.fr/v2';

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
        $this->urlToCall = self::API_URL . '/'
            . strtolower($this->transport->getType()) . 's/'
            . strtolower($this->transport->getIdLine()) . '/stations/'
            . strtolower($this->transport->getStation()) . '?destination='
            . strtolower($this->transport->getDestination());
    }

    /**
     * @return string
     */
    public function getUrlToCall()
    {
        return (string)$this->urlToCall;
    }
}