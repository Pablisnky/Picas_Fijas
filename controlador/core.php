<?php    
    //incluido en "recibe_Index.php" evaluaa las picas y fijas e inserta en BD

    //Se trae el valor de aleatorio por medio de sesion creada en recibe_Index.php
    $Aleatorio= $_SESSION["Numero_Alea"];
    // echo "Aleatorio = " . $_SESSION["Numero_Alea"] . "<br>";

    //Se accede al servidor de base de datos
    include("../conexion/Conexion_BD.php");

    //Se consulta si el número ingresado por el usuario coincide con el número aleatorio generado y guardado en $_SESSION
    if($Aleatorio != $Num_Us){   
        //Se verifica cuantos intentos lleva el participante
        $Consulta_1="SELECT numero_ale FROM numero_usuario WHERE IP_dispositivo = '$IP' AND numero_ale= '$Aleatorio'";
        $Recordset_1 = mysqli_query($conexion, $Consulta_1);
        $Intentos =mysqli_num_rows($Recordset_1);
        // echo "Número de intentos= " . $Intentos . "<br>";
        // echo "numero aleatorio antes de cargar en BD= " . $Aleatorio .  "<br>";
        if($Intentos < 10){
            // echo "Se comparan los arrays para conocer las fijas" . "<br>";

            //Se convierte el numero aleatorio en un array
            $caracteres_ale= str_split($caracteres_ale);

            // Se comparan ambos arrays
            $Compara_2 = array_diff_assoc($caracteres_usu, $caracteres_ale);
            // var_dump($Compara_2);
                    
            // Se informa si no obtuvo ni Picas ni Fijas
            //Se cuanta cuantos elementos tiene el array que compara los numeros
            if(count($Compara_2) == 4){
                // echo "No tienes fijas";
                $Fijas = 0;
            }
            else if(count($Compara_2) == 3){
                // echo "Obtuviste una Fija";
                $Fijas = 1;
            }
            else if(count($Compara_2) == 2){
                // echo "Obtuviste dos Fija";
                $Fijas = 2;
            }
            else if(count($Compara_2) == 1){
                // echo "Obtuviste tres Fija";
                $Fijas = 3;
            }
            else if(count($Compara_2) == 0){
                // echo "Obtuviste cuatro Fija";
                $Fijas = 4;
            }

            // ***********************************************************************************

            // echo "Se comparan los arrays para conocer las picas" . "<br>";
            // Se comparan ambos arrays
            $Compara= array_diff($caracteres_ale, $Compara_2);
            // var_dump($Compara); 

            // $valores= array_slice($valores,0);
            // var_dump($valores[2]);
            // Se informa si no obtuvo ni Picas ni Fijas
            //Se cuanta elementos tiene el array que compara los números
            if(count($Compara) == 4){
                // echo "No tienes Picas";
                $Picas = 0;
            }
            else if(count($Compara) == 3){
                // echo "Obtuviste una Pica";
                $Picas = 1;
            }
            else if(count($Compara) == 2){
                // echo "Obtuviste dos Pica";
                $Picas = 2;
            }
            else if(count($Compara) == 1){
                // echo "Obtuviste tres Pica";
                $Picas = 3;
            }
            else if(count($Compara) == 0){
                // echo "Obtuviste cuatro Pica";
                $Picas = 4;
            }

            //*************************************************************************************    
            if($Num_Us != " "){
                //Se consulta que tipo de variable
                // echo "Número aleatorio es de tipo= " . gettype($Aleatorio) . "<br>";
                // echo "Número usuario es de tipo= " . gettype($Num_Us) . "<br>";
                // echo "IP dispositivo= " . $IP . "<br>";

                //Se inserta en BD el numero del usuario y las picas y fijas que obtuvo
                $Insertar_1= "INSERT INTO numero_usuario(numero_usu, numero_ale, fijas, picas, IP_dispositivo) VALUES ('$Num_Us','$Aleatorio','$Fijas','$Picas','$IP')";
                mysqli_query($conexion, $Insertar_1);

                //Se inserta la fecha de la prueba en la BD
                //1-Se consulta si el numero aleatorio ya fue asignado al dispositivo en uso la fecha mostrada
                $Consulta_7= "SELECT ID_Usuario FROM pruebas_usuario WHERE aleatorio = '$Aleatorio' AND IP_dispositivo = '$IP' AND DATE_FORMAT(fecha_reto, '%y-%m-%d') = CURDATE()";
                $Recordset_7 = mysqli_query($conexion, $Consulta_7);
                if(mysqli_num_rows($Recordset_7) == 0){
                    $Insertar_2= "INSERT INTO pruebas_usuario(IP_dispositivo, aleatorio, fecha_reto) VALUES ('$IP','$Aleatorio', NOW())";
                    mysqli_query($conexion, $Insertar_2); 
                }
            }

            include("Resultados.php");
        }
        else{
            //  include("Resultados.php");
        }
    }
    else{//si acierta el codigo secreto
        //Se cierra el reto
        $Actualizar_1= "UPDATE numero_usuario SET reto_cerrado= 1 WHERE IP_dispositivo = '$IP' AND numero_ale= '$Aleatorio'";
        mysqli_query($conexion, $Actualizar_1);
        
        //Se informa si el reto fue logrado o no
        $Actualizar_1= "UPDATE pruebas_usuario SET reto_logrado= 1 WHERE IP_dispositivo = '$IP' AND numero_ale= '$Aleatorio'";
        mysqli_query($conexion, $Actualizar_1);
        
        echo "<div class='contenedor_modal '>";
        echo "<p class='parrafo_2'>Felicitaciones</p>";
        echo "<p class='parrafo_3'>Acertaste el código secreto</p>";
        echo "<p class='parrafo_3'>Deseas registrar tus resultados</p>";
        echo "<a class='label_1' href='vista/registro.php?aleatorio=$Aleatorio'>Registrarse</a>";   
        echo "<a class='label_1' href='index.php'>Iniciar nuevo reto</a>";
        echo "</div>";

        include("Resultados.php");
        
        //Se cierran todas las sesiones creadas antes de crear las nuevas
        include("cerrarSesion.php"); 
    }