<?php

declare(strict_types=1);

namespace Lametric;

class Api
{
    const API_URL = 'https://api-ratp.pierre-grimaud.fr/v3';

    /**
     * @var string
     */
    private string $urlToCall;

    /**
     * @var Transport
     */
    private Transport $transport;

    /**
     * @param Transport $transport
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public function createUrlToCall(): void
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
    public function getUrlToCall(): string
    {
        return $this->urlToCall;
    }
}
