<?php
    require_once "constantesRemoto.php";

    //se instancia un objeto para la clase (nativa) mysqli y se le envian parametro al metodo constructor
    $conexion = new mysqli(HOSTING, USUARIO, PASSWORD, NOMBRE_BD);

    //se verifica si la conexión y selección de la base de datos se efectuó en forma correcta
    if($conexion->connect_error){
      die('Problemas con la conexion a la base de datos de horebi.com');
    }

    mysqli_query($conexion,'SET NAMES "' . CHARSET . '"');//es importante esta linea para que los caracteres especiales funcionen, tanto graficamente como logicamente
?>