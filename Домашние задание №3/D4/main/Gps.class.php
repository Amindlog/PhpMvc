<?php
class Gps implements InterfaceService
{
    private $priceToClock = 15;
    private $timesClock; //минут

    public function __construct($times)
    {
        $this->setTimesClock($times);
    }

    public function setTimesClock($times)
    {
        $this->timesClock = $times;
    }

    public function getTimesClock(): int
    {
        return $this->timesClock;
    }

    public function Values(): int
    {
        return $this->timesClock / 60 * $this->priceToClock;
    }
}

//$gps = new Gps(15)->Values();
// or $gps = new Gps(15);
//$gps->Values(); значение сервиса gps