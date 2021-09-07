<?php

class Clock extends AbsTariff
{
    private $priceForMinute = 200;
    private $service = [];
    public function __construct($times)
    {
        $this->times = $times;
    }

    public function sumPrice(): int
    {
        if ($this->times >= 60) {
            $this->price = ceil($this->times / 60) * $this->priceForMinute;
            if (!empty($this->service)) {
                foreach ($this->service as $value) {
                    $this->price += $value;
                }
            }
        }
        return $this->price;
    }

    public function addService(InterfaceService $services)
    {
        array_push($this->service, $services->Values());
    }
}
