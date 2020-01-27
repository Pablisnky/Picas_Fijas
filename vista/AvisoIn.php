<!DOCTYPE html>
<html lang="es">
	<head>
        <title>Registro</title>

	    <link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas.css"/>
	    <link rel="stylesheet" type="text/css" href="../css/Modal.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
    <head>
    <body>
        <div class="">
        	<!-- <a href="../index.php">Cerrar</a>   -->
			<div class="modal"> 
				<article class="contenedor_modal modal_2">
					<p class="parrafo_2">Felicitaciones</p>
					<p class="parrafo_3">Acertaste el código secreto</p>
					<p class="parrafo_3">Deseas registrar tus resultados</p>
					<a class="label_1" href="registro.php">Registrarse</a>
					<a class='label_1' href='index.php'>Iniciar nuevo reto</a>
				</article>  					
			</div>        
        </div>
    </body>
</html>
<?php
    //Se cierran todas las sesiones creadas
    include("../controlador/cerrarSesion.php");
?>