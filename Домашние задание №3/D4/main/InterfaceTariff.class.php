<?php
interface InterfaceTariff
{
    public function sumPrice(): int;
    public function addService(InterfaceService $service);
}
