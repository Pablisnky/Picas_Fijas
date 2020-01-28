<?php
    session_start();
    
    //Se recibe el ID_Usuario si hubo inicio de sesion
    if(!empty($ID_Usuario)){

    }

   // **********************************************************************************************
    
   // muestra la ip del dispositivo
    function getRealIP() {
        if(!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        
        // muestra la ip del dispositivo Ej:muestra: 200.49.6.149
        return $_SERVER['REMOTE_ADDR'];
    }
    
    $IP= getRealIP();
    //Se crea una sesion para guardar el IP del dispositivo
    $_SESSION["IP_dispositivo"]= $IP;
    // echo "El IP del dispositivo es: " . $_SESSION["IP_dispositivo"] . "<br>";    
    
// **********************************************************************************************

    // Se recibe el numero ingresado por el usuario desde index.php por medio de Funciones_Ajax.js
    if(!empty($_GET["val_1"])){
        $Num_Us= $_GET["val_1"];
        // echo "Numero del usuario= " . $Num_Us . "<br>";

        //convierte el numero en un array
        $caracteres_ale= str_split($Num_Us);
        // print_r($caracteres_ale);

        //se verifica que el numero no contenga numeros repetidos
        $AleatorioUnico = array_unique($caracteres_ale);
        // print_r($AleatorioUnico);

        // //Se guarda en una sesion el numero aleatorio 
        // $_SESSION["Numero_Alea"]= $Aleatorio;
        // echo "aleatorio desde sesion= " . $_SESSION["Numero_Alea"] . "<br>";

        //Se saca el numero de elementos que contiene el array
        $longitud = count($AleatorioUnico);
        // echo "La longitud del array es = " . $longitud . "<br>";

        //No se admite el numero del usuario si tiene digitos repetidos
        if($longitud != 4){ 
            echo "<div class='contenedor_modal '>";
            echo "<p class='parrafo_3'>Los cuatro digitos introducidos deben ser diferentes entre si</p>";
            echo "</div>";
            exit();  
        }        
       
        // echo "Se crea el array del numero del usuario";      
        $valores_usu = array();

        // se introduce el numero del usuario en el array $valores_usu
        array_push($valores_usu, $Num_Us);
        // echo "array del usuario: ";
        // var_dump($valores_usu);

        //convierte el numero del usuaio en un array
        $caracteres_usu= str_split($Num_Us);
        // print_r($caracteres_usu);
    }
    
// **********************************************************************************************  
    
    //Se crea una funcion que genera numeros aleatorios automaticamente dependiendo del status del reto
    //Por defecto el numero aleatorio valdra cero, si se genera por medio de NumeroAletorio() su valo se sobreescribira; esta función es llamada lineas abajo
    
    //Se accede al servidor de base de datos
    include("../conexion/Conexion_BD.php");
    
    //Se consulta si el reto esta cerrado
    $Consulta_4="SELECT reto_cerrado FROM numero_usuario WHERE IP_dispositivo = '$IP' AND reto_cerrado='0' GROUP BY numero_ale ORDER BY reto_cerrado DESC LIMIT 1";
    $Recordset_4 = mysqli_query($conexion, $Consulta_4);
    $Retos_abiertos =mysqli_num_rows($Recordset_4);
    // echo "Cantidad de registro del reto= " .  $Retos_abiertos . "<br>";
    if($Retos_abiertos == 0){//reto cerrado se genera otro
        // echo "Entra en primera opcion" . "<br>";

        //Se genera el numero aleatorio   
        include("Borrar.php");         
    }
//********************************************************************************************
    // Se evalua si el reto esta en curso
    else if($Retos_abiertos > 0 && $Retos_abiertos < 10){
        // echo "Entra en segunda opcion" . "<br>";
        //Se consulta el numero aleatorio con que se esta jugando
        $Consulta_6= "SELECT COUNT(numero_ale) AS cantidad_2 FROM numero_usuario WHERE IP_dispositivo='$IP' GROUP BY numero_ale ORDER BY ID_NU DESC LIMIT 1";
        $Recordset_6 = mysqli_query($conexion, $Consulta_6);
        $Num_ale =mysqli_fetch_array($Recordset_6);

        if($Num_ale["cantidad_2"] < 10 || $Num_ale["cantidad_2"] > 0){
            //Se crea una sesion con el numero aleatorio en juego
            
            $caracteres_ale = $_SESSION["Numero_Alea"];

            // echo "entra aqui" . "<br>";
            // echo "Aleatorio en juego= " . $caracteres_ale . "<br>";
        }
        //convierte el numero aleatorio en un array
        // $caracteres_ale= str_split($Aleatorio);
        // print_r($caracteres_ale);

        //se verifica que el numero aleatorio no contenga numeros repetidos
        // $AleatorioUnico = array_unique($caracteres_ale);
        // print_r($AleatorioUnico);
    }
    //si el reto no se ha iniciado, es decir, $Retos_abiertos no tiene valor alguno
    else{
        // echo "Entra en ultima opcion" . "<br>";
        //Se genera el numero aleatorio
        include("Borrar.php");
    }

//************************************************************************************************

    //Se evalua si el numero del usuario contiene Picas o Fijas y se inserta en la BD; no evalua si es no se ha realizado ningun intento
    //Se evalua con empty para el caso cuando se refresque la pagina o al iniciar el reto que el usuario no envia ningun número
    if(!empty($_GET["val_1"])){
        include("core.php");
    }
?>