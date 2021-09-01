<?php

class gps implements iService{

    private $oneHour;

    public function __construct($hour) {
        $this->oneHour = $hour;
    }
    public function editSum(iTariff $tariff,$price)
    {
        $h = ceil($tariff->getTime() / 60 );
        $price += $this->oneHour * $h;
    }
}