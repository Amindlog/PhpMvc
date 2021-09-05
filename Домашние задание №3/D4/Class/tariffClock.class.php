<?php

class TariffClock
{
    private $priceForKm = 0;
    private $priceForMinute = 1;
    private $timeInDistance = 1; //час
    protected $priceGeneral;

    // private InterfaceService $service = [
    //     'gps' => [
    //         'time' => 3, //часа
    //         'price' => 15 //руб/ч
    //     ],
    //     'driver' => [
    //         'time' => 0,
    //         'price' => 100
    //     ]
    // ];


    public function __construct(float $priceForKm, int $priceForMinute)
    {

        $this->setPriceForKm($priceForKm);
        $this->setPriceForMinute($priceForMinute);
    }
    private function setPriceForKm($priceForKm)
    {
        $this->$priceForKm = $priceForKm;
    }
    private function setPriceForMinute($priceForMinute)
    {
        $this->priceForMinute = $priceForMinute;
    }

    public function getPriceForKm(): int
    {
        return $this->priceForKm;
    }

    public function getPriceForMinute(): int
    {
        return $this->priceForMinute;
    }
}
