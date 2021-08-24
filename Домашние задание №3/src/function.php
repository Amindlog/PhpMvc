<!-- Задание #3.1

+Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:

 +   id - уникальный идентификатор, равен номеру эл-та в массиве
   + name - случайное имя из 5-ти возможных (сами придумайте каких)
  +  age - случайное число от 18 до 45

+Преобразуйте массив в json и сохраните в файл users.json

+Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.

Посчитайте количество пользователей с каждым именем в массиве

+Посчитайте средний возраст пользователей -->

<?php

function task1()
{
    $arrayName = ["Маша", "Саша", "Женя", "Чудо", "Name"];
    
    $userName = [];

    for ($i = 0; $i < 50; $i++) {
        array_push(
            $userName,
        [
            "id" => $i,
            "name" => $arrayName[array_rand($arrayName)],
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
    
    $outArray = [       
       [range(0,count($arrayName))],
        'count'=> 0, 'iterator'=> 0];

    foreach (json_decode(file_get_contents($fileN), true) as $value) {

        $outArray['count'] += $value['age'];
        $outArray['iterator']++;
        // if ($value['name'] == $outArray['name'][0][0]) {
            
        // }    
        // echo $value['name'] . "<br>";
        // echo $value['age']. "<br>";

    }

    var_dump("Средний возраст = ". $outArray['count'] / $outArray['iterator']);
    
}


task1();
