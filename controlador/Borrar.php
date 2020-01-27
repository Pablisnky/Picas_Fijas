<?php
    // session_start();

    //Genera el un numero de cuatro cifras diferentes
    srand((float) microtime() * 10000000);
    $entrada = array("1","2","3","4","5","6","7","8","9","0");
    $Aleatorio = array_rand($entrada, 4);

    // print_r($Aleatorio);
    
    //Se convierte el array en un string
    $caracteres_ale= implode($Aleatorio);
    
    //Se guarda en una sesion el numero aleatorio 
    $_SESSION["Numero_Alea"]= $caracteres_ale;
    // echo "aleatorio desde sesion= " . $_SESSION["Numero_Alea"] . "<br>";
?>
        
