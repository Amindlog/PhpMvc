<?php

    $bmw = [
        "model" => "X5",
        "speed" => 120,
        "doors" => 5,
        "year"  => 2015
    ];
    $toyta = [
        "model" => "camry",
        "speed" => 160,
        "doors" => 4,
        "year"  => 2010
    ];
    $opel = [
        "model" => "astra",
        "speed" => 220,
        "doors" => 5,
        "year"  => 2021
    ];
    $auto = [$bmw, $opel,$toyta];
    var_export($auto);
    echo "<br>";

    for ($i = 0; $i < sizeof($auto); $i++) {
        echo "<pre>";
        foreach ($auto[$i] as $key => $value) {
            echo $key . " : " . $value . "<br>";
        }
        echo "</pre>";
    }
