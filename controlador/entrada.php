<?php
    session_start();

	$ID_Usuario = $_SESSION["ID_Usuario"];
	// echo "ID_Usuario= " . $_SESSION["ID_Usuario"] . "<br>";
	
	$Nombre = $_SESSION["Nombre"];
	// echo "Nombre= " . $_SESSION["Nombre"] . "<br>";

	// echo "El IP del dispositivo= " . $IP . "<br>";
	// echo "El numero aleatorio es= " . $Aleatorio . "<br>";
	
	include("../conexion/Conexion_BD.php");

	//Se consultan los datos del usuario
	$Consulta_1= "SELECT usuario.nombre, pruebas_usuario.reto_logrado, pruebas_usuario.fecha_reto FROM usuario INNER JOIN pruebas_usuario ON usuario.ID_Usuario=pruebas_usuario.ID_Usuario WHERE usuario.ID_Usuario = '$ID_Usuario' ORDER BY fecha_reto DESC";
	$Recordset_1 = mysqli_query($conexion,$Consulta_1);
	// $Fotografia = mysqli_fetch_row($Recordset_1);
	$i=1;
?>

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

		<link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas.css"/>
		<link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas_320.css"/>
		<link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas_1500.css"/> 
        <link rel="stylesheet" type="text/css" href="../iconos/icono_tilde_exis/style_tilde_exis.css"/><!--galeria icomoon.io  -->
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
	</head>	
	<body>
		<div class="contendor_10">
			<a class="a_1" href="cerrarSesion_2.php">Cerrar sesión</a>
			<input class="input_2" type="text" value="<?php echo $Nombre;?>" readonly>
		</div>
		<div class="contenedor_14">
			<div class="">
				<?php
					include("FotoPerfil.php");
				?>
			</div>
			<div class="contenedor_15">
				<table class="table_1">
					<caption class="caption_1">Mis resultados</caption>
					<thead>
						<th></th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Reto logrado</th>
					</thead>
					<tbody><?php
					while($Usuario = mysqli_fetch_array($Recordset_1)){  
						//Se cambia el formato a la fecha
						$Fecha = $Usuario["fecha_reto"];
						$Fecha = date_create($Fecha);
						$Fecha = date_format($Fecha, 'd-m-y'); 

						//Se cambia el formato a la hoa
						$Hora = $Usuario["fecha_reto"];
						$Hora = date_create($Hora);
						$Hora = date_format($Hora, 'h:i a');	?>
						<tr>
							<td class="td_1"><?php echo $i;?></td>
							<td class="td_1"><?php echo $Fecha;?></td>
							<td class="td_1"><?php echo $Hora;?></td>
							<td class="td_1">
								<?php
                                    if($Usuario["reto_logrado"]){ ?>
                                        <span class='icon icon-checkmark'></span> <?php 
                                    }
                                    else{  ?>
                                        <span class='icon icon-cross'></span>
                                        <?php
                                    }   ?>
                            </td> 
							</td>
						</tr>            
						<?php $i++; 
					}   ?>
					</tbody>
				</table>
			</div>	
			<div>
        		<a class='label_1 label_4' href='../controlador/cerrarSesion_2.php'>Iniciar nuevo reto</a>
			</div>
		</div>	
	</body>
</html>   