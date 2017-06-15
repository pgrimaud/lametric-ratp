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
            'default'  => 'i2600',
            'metro-1'  => 'i2605',
            'metro-2'  => 'i2606',
            'metro-3'  => 'i2608',
            'metro-3b' => 'i2607',
            'metro-4'  => 'i2609',
            'metro-5'  => 'i2610',
            'metro-6'  => 'i2590',
            'metro-7'  => 'i2611',
            'metro-7b' => 'i2612',
            'metro-8'  => 'i2613',
            'metro-9'  => 'i2614',
            'metro-10' => 'i2615',
            'metro-11' => 'i2617',
            'metro-12' => 'i2618',
            'metro-13' => 'i2616',
            'metro-14' => 'i2619',
            'rer-a'    => 'i2620',
            'rer-b'    => 'i2621'
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