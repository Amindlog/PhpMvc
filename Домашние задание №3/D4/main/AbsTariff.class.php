<?php
abstract class AbsTariff
{
    /** @property цены-минут-и-за-км будут задаватся в тарифе */
    protected $priceForKm;
    protected $priceForMinute;

    /** @property переменные задающие в конструкторе  */
    private $distance;
    private $times;

    /** @property массив_свойств  массив будем заполнять данными при добавлении сервиса 
     *  @array[
     *  0 => 65,
     *  1 => 4, все значения это результат подсчета сервиса вид записи new GPS(15,65)->servicePlus
     *  2 => 14
     * ]
     */
    private $iServiceMass = [];

    /** @property сумма общая сумма */
    private $generalPrice;

    public function __construct(float $distance, float $times)
    {

        $this->setDistance($distance);
        $this->setTimes($times);
    }

    /** @method genaralPriceCreated() = добавления доп услуг в наш тараф */
    public function generalPriceCreated()
    {
        $sum = $this->getDistance() * $this->getPriceForKm() + $this->getPriceForMinute() * $this->getTimes();
        $this->setGeneralPrice($sum);
        if (!empty($this->getIservice())) {
            foreach ($this->getIservice() as $value) {
                $this->setGeneralPrice($this->getGeneralPrice() * $value);
            }
        }
        return $this->getGeneralPrice();
    }

    /** @method addService = добавления доп услуг в наш тараф */
    public function addService(InterfaceService $iService) // new Gps(15,65)
    {
        array_push($this->iServiceMass, $iService);
    }

    public function editVarPrice(float $priceForKm, float $priceForMinute)
    {
        $this->setPriceForKm($priceForKm);
        $this->setPriceForMinute($priceForMinute);
    }

    //set
    protected function setPriceForKm($priceForKm)
    {
        $this->priceForKm = $priceForKm;
    }

    protected function setPriceForMinute($priceForMinute)
    {
        $this->priceForMinute = $priceForMinute;
    }

    private function setDistance($distance)
    {
        $this->distance = $distance;
    }

    private function setTimes($times)
    {
        $this->times = $times;
    }
    private function setGeneralPrice($generalprice)
    {
        $this->generalPrice = $generalprice;
    }

    //get
    private function getPriceForKm(): float
    {
        return $this->priceForKm;
    }

    private function getPriceForMinute(): float
    {
        return $this->priceForMinute;
    }

    private function getDistance(): float
    {
        return $this->distance;
    }

    private function getTimes(): float
    {
        return $this->times;
    }

    private function getGeneralPrice(): float
    {
        return $this->generalPrice;
    }

    private function getIservice(): array
    {
        return $this->iServiceMass;
    }
}
