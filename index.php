<?php
    include("controlador/muestraError.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro</title><head>

	    <link rel="stylesheet" type="text/css" href="css/EstilosPicas_Fijas.css"/>
	    <link rel="stylesheet" type="text/css" href="css/MediaQuery_EstilosPicas_Fijas.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

        <script type="text/javascript" src="javascript/Funciones_Ajax.js" ></script>
        <script type="text/javascript" src="javascript/Funciones_varias.js" ></script>
    </head>
    <body onload="llamar_evaluar();" >
        <div class="contendor_10">
            <a class="a_1" href="vista/participantes.php">Participantes</a>
            <a class="a_1" href="vista/principal.php">Inicia sesión</a>
        </div>
        <div class="contenedor_7">
            <div class="contenedor_4">
                <h1>PICAS Y FIJAS</h1>
                <p class="p_1">****</p>
                <p class="p_2">El recuadro amarillo contiene un código secreto de cuatro digitos</p>
                <p class="p_2">Descubrelo en 10 intentos, los cuales te darán las pistas para descifrarlo</p>

                <div class="contenedor_3">
                    <input class="input_1" type="text" name="numero_us" id="Numero_us" placeholder="Ingresar cuatro digitos" autocomplete="off">
                    <div id="Mostrar_boton">                        
                        <!-- por medio de Ajax muestra el boton de intentos, la información proviene de intentos.php al ser invocada la función llamar_cambiarNum() incluida en llamar_evaluar()-->
                    </div>
                </div>
            </div>
            <!-- por medio de Ajax muestra la tabla de resultados, la información proviene de Resultados.php al ser invocada la función llamar_evaluar en intento.php-->
            <div class="contenedor_5" id="Mostrar_evaluar">
            </div>
            <div class="contenedor_6" id="Contendor_6">
                <?php
                    include("vista/Instrucciones.php");
                ?>
            </div>                
        </div>
    </body>
</html>