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

        //Se consulta el IP del dispositivo, el codigo aleatorio y la fecha con la que el usuario participó, con estos datos se identifica el reto del usuario para guardarlo en su cuenta si asi lo desea

        $Consulta_8= "SELECT * FROM pruebas_usuario WHERE aleatorio = '$NumberAle' AND IP_dispositivo = '$IP' AND DATE_FORMAT(fecha_reto, '%y-%m-%d') = CURDATE()";
        $Recordset_8 = mysqli_query($conexion, $Consulta_8);
        $Particiante= mysqli_fetch_array($Recordset_8);
        $ID_PU = $Particiante["ID_PU"];

        // echo "ID_Prueba= " . $ID_PU . "<br>";
        
        echo "<article class='contenedor_modal modal_2'>";
        echo "<p class='parrafo_2'>Tus posibilidades de intentarlo terminaron</p>" . "<br>";
        echo "<p class='parrafo_2'>El código secreto era " . $NumberAle . "</p>";
        echo "<a class='label_1' href='index.php'>Iniciar nuevo reto</a>";
        echo "<br>";
        echo "<p class='parrafo_2'>Deseas guardar tu resultado</p>";
        echo "<a class='label_1' href='vista/registro.php?ID_PU=$ID_PU'>Registrarse</a>";
        
        //Se cierra el reto
        $Actualizar_1= "UPDATE numero_usuario SET reto_cerrado= 1 WHERE IP_dispositivo = '$IP' AND numero_ale= '$NumberAle'";
        mysqli_query($conexion, $Actualizar_1);
       
        //Se cierran todas las sesiones creadas antes de crear las nuevas
        // include("cerrarSesion.php");

        
    ?>