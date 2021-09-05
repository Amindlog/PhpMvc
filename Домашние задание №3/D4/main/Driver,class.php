<?php
class Driver implements InterfaceService
{
    private $driverPrice = 100;

    public function servicePlus(): int
    {
        return $this->getDriverPrice();
    }


    private function setDriverPrice($driverPrice)
    {
        $this->driverPrice = $driverPrice;
    }

    public function getDriverPrice(): float
    {
        return $this->driverPrice;
    }
}
