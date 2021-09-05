<?php 
class TariffStudent
{
    private $priceForKm = 4;
    private $priceForMinute = 1;

    public function __construct(int $priceForKm, int $priceForMinute) {
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