<?php

    $day = random_int(1, 9);
switch ($day) {
    case $day <= 5:
                                      echo "Это рабочий день";

        break;
    case $day > 5 && $day <= 7:
                                      echo 'Это выходной день';

        break;
    default:
                                      echo "Неизвестный день";

        break;
}
