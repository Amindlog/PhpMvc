<?php
class Driver implements InterfaceService
{
    private $driverCount = 1;
    private $driverPrice = 100;

    public function servicePlus(): int
    {
        if ($this->getiClock() > 60) {
            # code...
        }
        return ceil($this->getiClock() * 60) * $this->getItimes(); //узнаем минуты * на время ????????????
    }

    private function setDriverCount($driverCount)
    {
        $this->driverCount = $driverCount;
    }

    private function setDriverPrice($driverPrice)
    {
        $this->driverPrice = $driverPrice;
    }

    public function getDriverCount(): float
    {
        return $this->driverPrice;
    }
}
