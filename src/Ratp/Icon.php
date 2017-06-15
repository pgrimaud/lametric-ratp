<?php
namespace Lametric\Ratp;

class Icon
{
    const ICON_ERROR = 'i2600';

    /**
     * @var Transport
     */
    private $transport;

    /**
     * @var string
     */
    private $iconCode;

    /**
     * Icons constructor.
     * @param Transport $transport
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
        $this->iconCode  = $this->getIcon();
    }

    /**
     * @return mixed
     */
    private function getIcon()
    {
        $icons = [
            'default'   => 'i2600',
            'metros_1'  => 'i2605',
            'metros_2'  => 'i2606',
            'metros_3'  => 'i2608',
            'metros_3b' => 'i2607',
            'metros_4'  => 'i2609',
            'metros_5'  => 'i2610',
            'metros_6'  => 'i2590',
            'metros_7'  => 'i2611',
            'metros_7b' => 'i2612',
            'metros_8'  => 'i2613',
            'metros_9'  => 'i2614',
            'metros_10' => 'i2615',
            'metros_11' => 'i2617',
            'metros_12' => 'i2618',
            'metros_13' => 'i2616',
            'metros_14' => 'i2619',
            'rers_a'    => 'i2620',
            'rers_b'    => 'i2621'
        ];

        return isset($icons[$this->transport->getLine()]) ? $icons[$this->transport->getLine()] : $icons['default'];
    }

    /**
     * @return mixed
     */
    public function getIconCode()
    {
        return $this->iconCode;
    }
}