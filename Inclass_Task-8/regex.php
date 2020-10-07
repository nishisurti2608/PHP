<?php


$regex = "/3Rssf4x_23559/i";
$string = "This is my first 3Rssf4x_23559";



    echo "-------------------------\r\n";

    echo (preg_match($regex, $string, $array) == 0 ? "NO" : "YES"); 
 echo " '$regex'              IN STRING:         '$string'\n";


  


?>