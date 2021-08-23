<!-- Задание #3.1

Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:

    id - уникальный идентификатор, равен номеру эл-та в массиве
    name - случайное имя из 5-ти возможных (сами придумайте каких)
    age - случайное число от 18 до 45

Преобразуйте массив в json и сохраните в файл users.json

Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.

Посчитайте количество пользователей с каждым именем в массиве

Посчитайте средний возраст пользователей -->

<?php

function task1()
{
    $arrayName = ["Маша", "Саша", "Женя", "Чудо", "Name"];
    
    $userName[] = '';

    for ($i = 0; $i < 50; $i++) {
        array_push($userName,
        [
            "id" => $i,
            "name" => array_rand($arrayName),
            "age" => rand(18, 45)
        ]);        
    }

    $fileN = "users.json";

    if (!file_exists($fileN)){

        file_put_contents($fileN, json_encode($userName));
    }else {


        unlink($fileN);

        file_put_contents($fileN, json_encode($userName));
    }

    $decode = json_decode(file_get_contents($fileN), true);

    foreach ($decode as $key => $value) {

        var_dump( $value );
        
    }

    

    // for ($i = 0; $i < 50; $i++) {
    //     echo "<pre>";
    //     var_dump($userName[$i]);
    //     echo "</pre>";
    // }
}


task1();
