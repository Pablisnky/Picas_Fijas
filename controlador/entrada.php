
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Reavivados</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas para ganar dinero."/>
				<meta name="keywords" content="juego, preguntas, dinero"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content=""><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
			   	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
				<link rel="shortcut icon" type="image/png" href="../images/logo.png">

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
			</head>	
			<body onload="toTop()">
				<br><br><br><br><br><br><div class="contenedor_1">
    <!-- Se consultan los numeros ingresados y las picas y fijas -->
    <?php
        // echo "El IP del dispositivo= " . $IP . "<br>";
        // echo "El numero aleatorio es= " . $Aleatorio . "<br>";
        
    ?>
<div>
    $i=1;
    <table class="table_1">
        <thead>
            <th></th>
            <th>Fecha</th>
            <th>Reto logrado</th>
        </thead>
        <tbody><?php
         while($Resultado_2 =mysqli_fetch_array($Recordset_2)){  ?>
            <tr>
                <td class="td_1"><?php echo $i;?></td>
                <td class="td_1"><?php echo $Resultado_2["numero_usu"];?></td>
            </tr>            
            <?php $i++; 
         }   ?>
        </tbody>
    </table>
</div>
				<div class="Secundario" onclick="ocultarMenu()">	
					<p class="Inicio_9">¿Estudiaste el capítulo de hoy?</p>
					<p class="Inicio_14"><?php echo $CapituloHoy;?></p> 
					<a class="buttonCuatro a_3" href="registro_Libre.php?Tema=Reavivados">Iniciemos</a>   
					<hr style="border-color: #040652; border-style: solid; border-width: 2px;">
					<p class="Inicio_9 p_6">O si prefieres</p>
					<p class="Inicio_1">Seleccione una tema para un test de 10 preguntas.</p>
						
					<a class="cerrar" href="cerrarSesion_2.php">Cerrar Sesión</a>
				</div>
			</body>
		</html>   