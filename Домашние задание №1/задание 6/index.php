<table>
   <?php 
       for ($i = 0; $i <= 10 ; $i++) 
       { 
           echo "\t<tr>";
            for ($j = 0; $j <= 10; $j++) 
            { 
                if ($i != 0 && $j != 0) {
                    echo "<td>". $i * $j . "</td>";
                }                
            }
            echo "<tr>";
       }
    ?>
    </table>