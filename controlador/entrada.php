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

		<link rel="stylesheet" type="text/css" href="../css/Estilos.css"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
		<link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
	</head>	
	<body>
			<!-- Se consultan los numeros ingresados y las picas y fijas -->
			<?php
				// echo "El IP del dispositivo= " . $IP . "<br>";
				// echo "El numero aleatorio es= " . $Aleatorio . "<br>";

				
				include("../conexion/Conexion_BD.php");

				//Se consultan los datos del usuario
				$Consulta_1= "SELECT * FROM usuario WHERE ID_Usuario='2'";
				$Recordset_1 = mysqli_query($conexion,$Consulta_1);
				$Usuario= mysqli_fetch_array($Recordset_1);
				$i=1;
			?>
		<div class="contenedor_14">
			<?php
				include("FotoPerfil.php");
			?>
		</div>
		<div class="contenedor_15">
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
	</body>
</html>   