<div>
    <?php
        // session_start();
        //Archivo invocado desde intentos.php cuando se han alcanzado los diez intentos

        //Se llama al numero aleatorio desde la sesion creada en recibe_Index.php
        $NumberAle= $_SESSION["Numero_Alea"];
        // echo "Numero aleatorio: " . $NumberAle . "<br>";
        
        //Se llama al IP_dispositivo desde lasesion creada en recibe_Index.php
        $IP= $_SESSION["IP_dispositivo"];
        // echo "IP: " . $IP . "<br>";

        echo "<article class='contenedor_modal modal_2'>";
        echo "<p class='parrafo_2'>Tus posibilidades de intentarlo terminaron</p>" . "<br>";
        echo "<p class='parrafo_2'>El código secreto era " . $NumberAle . "</p>";
        echo "<a class='label_1' href='index.php'>Iniciar nuevo reto</a>";
        echo "<a class='label_1' href='../vista/registro.php'>Registrarse</a>";
        
        //Se cierra el reto
        $Actualizar_1= "UPDATE numero_usuario SET reto_cerrado= 1 WHERE IP_dispositivo = '$IP' AND numero_ale= '$NumberAle'";
        mysqli_query($conexion, $Actualizar_1);
       
        //Se cierran todas las sesiones creadas antes de crear las nuevas
        include("cerrarSesion.php");
        
    ?>