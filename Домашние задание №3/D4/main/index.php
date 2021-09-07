<?php

include "AbsTariff.class.php";
include "Driver.class.php";
include "Gps.class.php";
include "InterfaceService.class.php";
include "InterfaceTariff.class.php";
include "BaseTariff.class.php";
include "ClockTariff.class.php";
include "Student.class.php";

$base = new BaseTariff(15, 10);
$base->addService(new Gps(15));
echo $base->sumPrice();


$study = new Student(15, 10);
$study->addService(new Driver());
$study->addService(new Gps(20));
echo $study->sumPrice();


$clock = new Clock(61);
$clock->addService(new Gps(10));
echo $clock->sumPrice();
