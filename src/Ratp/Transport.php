<?php
namespace Lametric\Ratp;

class Transport
{
    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $idLine;

    /**
     * @var string
     */
    private $line;

    /**
     * @var string
     */
    private $station;

    /**
     * @var string
     */
    private $type;

    /**
     * Transport constructor.
     * @param array $params
     */
    public function __construct($params = array())
    {
        $this->params = $params;
    }

    /**
     * @throws TransportException
     */
    public function validateParameters()
    {
        $rowsToCheck = [
            'line',
            'destination',
            'station'
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
    public function setLine()
    {
        $transportTypesAllowed = [
            'metros',
            'rers',
            'tramways'
        ];

        $xpl = explode('_', $this->line);

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
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @return string
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getIdLine()
    {
        return $this->idLine;
    }

}