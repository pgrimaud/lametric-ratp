<?php
namespace Lametric\Ratp;

class Response
{
    /**
     * @var Icon
     */
    private $icon;

    /**
     * @var mixed
     */
    private $body;

    /**
     * Response constructor.
     */
    public function __construct()
    {
        header("Content-Type: application/json");
    }

    /**
     * @return mixed
     */
    public function returnError()
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'Please check app configuration',
                    'icon'  => Icon::ICON_ERROR
                ]
            ]
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function asJson($data = array())
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * @param Icon $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = json_decode($body, true);
    }

    /**
     * @return mixed
     */
    public function returnResponse()
    {
        $destination = (string)$this->body['result']['schedules'][0]['destination'];

        if (isset($this->body['result']['schedules'][1]['message'])) {
            $message = str_replace('mn', 'min', (string)$this->body['result']['schedules'][0]['message']);
        } else {
            $message = 'Unknown';
        }

        if (isset($this->body['result']['schedules'][1]['message'])) {
            $message2 = str_replace('mn', 'min', (string)$this->body['result']['schedules'][1]['message']);
        } else {
            $message2 = 'Unknown';
        }

        $data = [
            'frames' => [
                [
                    'index' => 0,
                    'text'  => $destination,
                    'icon'  => $this->icon->getIconCode()
                ],
                [
                    'index' => 1,
                    'text'  => $message,
                    'icon'  => $this->icon->getIconCode()
                ],
                [
                    'index' => 2,
                    'text'  => $message2,
                    'icon'  => $this->icon->getIconCode()
                ]
            ]
        ];

        return $this->asJson($data);
    }

    public function updateError()
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'Please update application',
                    'icon'  => Icon::ICON_ERROR
                ]
            ]
        ]);
    }
}
