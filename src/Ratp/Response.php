<?php

declare(strict_types=1);

namespace Lametric;

class Response
{
    /**
     * @var Icon
     */
    private Icon $icon;

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
     * @return string
     */
    public function returnError(): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'Please check app configuration',
                    'icon'  => Icon::ICON_ERROR,
                ],
            ],
        ]);
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public function asJson(array $data = []): string
    {
        return json_encode($data);
    }

    /**
     * @param Icon $icon
     */
    public function setIcon(Icon $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @param mixed $body
     */
    public function setBody(mixed $body): void
    {
        $this->body = json_decode($body, true);
    }

    /**
     * @return string
     */
    public function returnResponse(): string
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
                    'icon'  => $this->icon->getIconCode(),
                ],
                [
                    'index' => 1,
                    'text'  => $message,
                    'icon'  => $this->icon->getIconCode(),
                ],
                [
                    'index' => 2,
                    'text'  => $message2,
                    'icon'  => $this->icon->getIconCode(),
                ],
            ],
        ];

        return $this->asJson($data);
    }

    /**
     * @return mixed
     */
    public function updateError(): string
    {
        return $this->asJson([
            'frames' => [
                [
                    'index' => 0,
                    'text'  => 'Please update application',
                    'icon'  => Icon::ICON_ERROR,
                ],
            ],
        ]);
    }
}
