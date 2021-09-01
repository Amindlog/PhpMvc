<?php
/** interface */
interface iTariff
{
    public function sumPrice();
    public function addService(iService $service);
    public function getTime();
    public function getDistance();
}

interface iService
{
    public function editSum(iTariff $tariff,&$price);
}
/** end interface */

abstract class baseTariff implements iTariff
{
    protected $priceM;
    protected $priceKm;
    protected $distance;
    protected $time;

    protected $services = [];

    public function __construct($distances, $times)
    {
        $this->setDistanse($distances);
        $this->setTime($times);
    }

    public function setDistanse($distances)
    {

        $this->distance = $distances;
    }

    public function setTime($times)
    {
        $this->time = $times;
    }

    public function sumPrice()
    {
        $price = $this->distance * $this->priceKm + $this->priceM * $this->time;

        if ($this->services) {
            foreach ($this->services as $service) {
                $service->editSum($this,$price);
            }
        }
        return $price;
    }
    public function addService(iService $service):iTariff
    {
        array_push($this->services, $service);
        return $this;
    }
    public function getTime()
    {
        $this->time;
    }
    public function getDistance()
    {
        $this->distance;
    }
}
