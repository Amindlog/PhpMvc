<?php
    function task1($array_string, $is_boolean_type = false)
    {
        if(!$is_boolean_type)
        {
            for ($i = 0; $i < sizeof($array_string) ; $i++)
            { 
               echo "<p>" . $array_string[$i] . "</p>"; 
            }
        }
        else
        {
            for ($i = 0; $i < sizeof($array_string) ; $i++)
            { 
                $str .= $array_string[$i]. " ";
            }
            return $str;
        }
    }

    function task2($params)
    {
        $params = func_get_args();
        
        switch ($params[0]) {
            case '+':
                $str_To_Print = "Результат: "; 
                for ($i = 1; $i < sizeof($params); $i++)
                { 
                    if ($i != sizeof($params)-1) 
                    {
                        $str .= $params[$i]. " " . $params[0] . " ";
                    }
                    else
                    {
                        $str .= $params[$i]. " ";
                    }
                    
                    $sum += $params[$i];
                }
                 echo $str .= " = " . $sum;
                break;
            
            default:
                echo "работаем по заданию";
                break;
        }
    }
    

    function task3($x = null, $y = null)
    {
        if(isset($x) && isset($y) && $x == $y)
        {
            echo "<table>";
            for ($i = 1; $i <= $x; $i++)
            { 
                echo "<tr>";
                for ($j = 1; $j <= $y ; $j++)
                { 
                    echo "<td>" . $i * $j . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "какие то не поладки";
        }
    }


    function task4()
    {
        echo date("d.m.Y H:i:s");
        // utc зависит от настроек сервера, мой хост стоит на московском вермени
        // так что мне не нужна  date_default_timezone_get("Europe/Moscow");
        
        $stringToTime = strtotime("24.02.2016 00:00:00");

        echo "<br>" . $stringToTime . "<br>";
        
        echo date("d-M-Y  H:i:s", $stringToTime);
        
    }

    function task5()
    {
        $str = "Карл у Клары украл Кораллы";

        $str1 = "Две бутылки лимонада";

        $newStr = str_replace("К", "", $str);

        $newStr1 = str_replace("Две", "Три", $str1);
        
        echo $newStr. "<br>";
        echo $newStr1. "<br>";
    }

    function task6($nameFile, $massege)
    {
        if(file_exists($nameFile))
        {
            return file_get_contents($nameFile);
        }
        else
        {
            $file = fopen("test.txt", 'a');
            fputs($file, $massege . "\n");
            fclose($file);
            return file_get_contents($nameFile);
        }
        
    }