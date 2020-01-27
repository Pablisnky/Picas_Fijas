<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php

$Recordar= isset($_POST["recordar"]) == 1 ? $_POST["recordar"] : "No desea recordar";
$Clave= $_POST["clave"];
$Correo= $_POST["correo"];
    // echo "La clave es: " . $Clave . "<br>";
    // echo "El correo es: " . $Correo . "<br>";
    // echo "Desea recordar es: " . $Recordar . "<br>";

    include("../conexion/Conexion_BD.php");
    
    //Se consulta el ID_Participante segun el correo recibido
    $Consulta="SELECT * FROM usuario WHERE Correo='$Correo' ";
    $Recordset = mysqli_query($conexion, $Consulta);
    $Usuario= mysqli_fetch_array($Recordset);
    $ID_Usuario= $Usuario["ID_Usuario"];
    // echo "ID_Participante= " . $ID_Participante_2 . "<br>";
    // echo "Correo en BD= " . $Participante_2["Correo"] . "<br>"; 

// if(isset($_POST["recordar"]) && $_POST["recordar"] == 1){//si pidió memorizar el usuario, se recibe desde principal.php   
//     //1) creo una marca aleatoria en el registro de este usuario
//     //alimentamos el generador de aleatorios
//     // mt_srand (time());
//     // //generamos un número aleatorio
//     // $Aleatorio = mt_rand(1000000,999999999);
//     // echo "Nº aleatorio= " . $aleatorio . "<br>"; 

//     //3) ahora meto una cookie en el ordenador del usuario con el identificador del usuario y la cookie aleatoria porque el usuario marca la casilla de recordar
//     setcookie("id_usuario", $ID_Participante_2, time()+365*24*60*60, "/");
//     setcookie("clave", $Clave, time()+365*24*60*60, "/");
//     // echo "Se han creado las Cookies en validarSesion" . "<br>";

//     // echo "La cookie ID_Usuario = " . $_COOKIE["id_usuario"] . "<br>";
//     // echo "La cookie clave = " . $_COOKIE["clave"] . "<br>"; 
    
//     //4) meto la marca aleatoria en el registro correspondiente al usuario
//     $Actualizar="UPDATE participante SET Aleatorio='$Aleatorio' WHERE ID_Participante='$ID_Participante_2'";
//     mysqli_query($conexion, $Actualizar);
// }

    //Verifica si los campo que se van a recibir desde principal.php estan vacios
    if(empty($_POST["correo"]) || empty($_POST["clave"])){

        echo"<script>alert('Debe Llenar todos los campos vacios');window.location.href='../vista/principal.php';</script>";
    }
    else{
        //sino estan vacios se sanitizan y se reciben
        $Correo = filter_input( INPUT_POST, 'correo', FILTER_SANITIZE_STRING);
        $Clave = filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING);
        // echo "Correo recibido: " .  $Correo . "<br>";
        // echo "Clave recibida: " . $Clave . "<br>";

        //Se verifica que la contraseña enviada sea igual a la contraseña de la BD        
        $Consulta_2="SELECT * FROM clave_usuario WHERE ID_Usuario='$ID_Usuario'";
        $Recordset_2 = mysqli_query($conexion, $Consulta_2);
        $Participante= mysqli_fetch_array($Recordset_2);
        // echo "Clave Usuario cifrada= " . $Participante["clave"] . "<br>";
        // echo "Clave Usuario descifrada= " . password_verify($Clave, $Participante["clave"]);

        //se descifra la contraseña con un algoritmo de desencriptado.
        if($Correo == $Usuario["correo"] AND $Clave == password_verify($Clave, $Participante["clave"])){
            //se crea una sesion que almacena el ID_Usuario exigida en todas las páginas de su cuenta

            $_SESSION["ID_Usuario"]= $Participante["ID_Usuario"];//se crea una $_SESSION llamada Participante que almacena el ID del participante para  forzar a que entre a su cuenta solo despues de logearse.
            // echo "La sesion ID_Participante= " . $_SESSION["ID_Participante"] . "<br>";

            $_SESSION["Nombre_Participante"]= $Participante["nombre"];//se crea una $_SESSION llamada Participante que almacena el nombre del participante para  forzar a que entre a su cuenta solo despues de logearse.
            // echo "La sesion Nombre_Participante= " . $_SESSION["Nombre_Participante"] . "<br>";
          
            header("location:entrada.php");//Se da acceso y se Redirije a la pagina "entrada.php" para comenzar con las preguntas del juego
        }
        else{  ?>
            <script>
                alert("USUARIO y CONTRASEÑA no son correctas");
                history.back();
            </script> 
              <?php
        }    
    }   ?>
    