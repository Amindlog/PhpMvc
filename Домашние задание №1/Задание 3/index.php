<?php 
    $age = mt_rand(0,100);

    if ($age > 18 && $age < 65) 
    {
        echo "Вам еще работать и работать";
    }
    else if($age > 65)
    {
        echo "Вам пора на пенсию";
    }
    else if($age < 17)
    {
        echo "Вам еще рано работать";
    }
    else if($age > 90 && $age <=100)
    {
        echo "Неизвестный возраст";
    }
    