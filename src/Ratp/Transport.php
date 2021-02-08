<?php

declare(strict_types=1);

namespace Lametric;

class Transport
{
    /**
     * @var string
     */
    private string $destination;

    /**
     * @var string
     */
    private string $idLine;

    /**
     * @var string
     */
    private string $line;

    /**
     * @var string
     */
    private string $station;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var array
     */
    private array $params;

    /**
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    /**
     * @throws TransportException
     * @throws UpdateException
     */
    public function validateParameters(): void
    {
        $rowsToCheck = [
            'line',
            'destination',
            'station',
        ];

        if (!isset($this->params['delay'])) {
            throw new UpdateException;
        }

        foreach ($rowsToCheck as $row) {
            if (!isset($this->params[$row]) || empty($this->params[$row])) {
                throw new TransportException;
            } else {
                $this->{$row} = $this->params[$row];
            }
        }
    }

    /**
     * @throws TransportException
     */
    public function setLine(): void
    {
        $transportTypesAllowed = [
            'metro',
            'rer',
            'tramway',
        ];

        $xpl = explode('-', $this->line);

        if (!in_array($xpl[0], $transportTypesAllowed)) {
            throw new TransportException;
        } else {
            $this->type   = $xpl[0];
            $this->idLine = $xpl[1];
        }

        if (empty($this->line) || empty($this->type)) {
            throw new TransportException;
        }
    }

    /**
     * @return string
     */
    public function getLine(): string
    {
        return $this->line;
    }

    /**
     * @return string
     */
    public function getStation(): string
    {
        return $this->station;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getIdLine(): string
    {
        return $this->idLine;
    }
}
