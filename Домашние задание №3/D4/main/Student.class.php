<?php

class Student extends AbsTariff
{
    private $priceForKm = 4;
    private $priceForMinute = 1;

    public function __construct($km, $min)
    {
        $this->distance = $km;
        $this->time = $min;
    }

    public function sumPrice(): int  //new Gps(растояние и время)
    {
        $this->price = $this->distance * $this->priceForKm + $this->distance * $this->priceForMinute;
        if (!empty($this->service)) {
            foreach ($this->service as $value) {
                $this->price += $value;
            }
        }
        return $this->price;
    }

    public function addService(InterfaceService $service) // new gps(15(minute)); new driver(2 count)
    {
        array_push($this->service, $service->Values());
    }
}
