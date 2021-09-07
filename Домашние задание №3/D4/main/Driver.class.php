<?php
class Driver implements InterfaceService
{
    private $priceDriver  = 100;

    public function getPriceDriver(): int
    {
        return $this->priceDriver;
    }

    public function Values(): int
    {
        return $this->getPriceDriver();
    }
}
