<?php

include "tariffBasic.php";
include "interface.php";
include "serviceGPS.php";

$tariff = new tariffBasic(5,60);
$tariff->addService(new gps(15));

echo $tariff->sumPrice();
