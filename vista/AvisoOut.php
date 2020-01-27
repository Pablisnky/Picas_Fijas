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
        	<a href="../index.php">Cerrar</a>  
			 <div class="modal"> 
				<article class="contenedor_modal modal_2">					
                    <p class="parrafo_3">Tus posibilidades de intentarlo terminaron</p>
                    <p class="parrafo_3">El código secreto era  <?php //echo $NumberAle;?></p>
                    <a class='label_1' href='index.php'>Iniciar nuevo reto</a>
                    <p>Deseas registrar tus resultados</p>
                    <label class="label_1 label_2" onclick="instrucciones()">Registrarse</label>
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