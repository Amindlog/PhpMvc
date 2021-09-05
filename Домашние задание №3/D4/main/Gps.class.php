<?php

class Gps implements InterfaceService
{
    private $iClock; // в часах
    private $iTimes = 60;

    public function __construct(float $iClock, float $iTimes)
    {
        $this->setIdistanse($iClock);
        $this->setItimes($iTimes);
    }

    private function setIdistanse(float $iClock)
    {
        $this->iClock = $iClock;
    }
    private function setItimes(float $iTimes)
    {
        $this->iTimes = $iTimes;
    }

    private function getiClock(): float
    {
        return $this->iClock;
    }
    private function getItimes(): float
    {
        return $this->iTimes;
    }

    //идея взять значения от тарифа и пепевесии минуты и умножить на значение минут 
    public function servicePlus(): int
    {
        if ($this->getiClock() > 60) {
            # code...
        }
        return ceil($this->getiClock() * 60) * $this->getItimes(); //узнаем минуты * на время ????????????
    }
}
