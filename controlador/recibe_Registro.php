<?php   
    session_start();  

   	$verifica = $_SESSION["verifica"];
    if($verifica == 1906){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
 		unset($_SESSION['verifica']);//se borra la $_SESSION verifica.
 
    	//se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
    	//echo $verifica;
		// se reciben los datos enviados del formulario de registro-
					
		$Nombre = htmlspecialchars($_POST["nombre"]);
		$Correo = htmlspecialchars($_POST["correo"]);
		$Correo = strtolower($Correo );
		$Pais = htmlspecialchars($_POST["pais"]);
		if(!empty($_POST["otroPais"])){
			$OtroPais= $_POST["otroPais"];
		}
		else{
			$OtroPais= "indico pais de catalogo";
		}
		$Clave = $_POST["clave"];
		$ConfirmarClave = $_POST["confirmarClave"];
		$ID_PU = $_POST["ID_PU"];

		// echo "Nombre: " . $Nombre . "<br>" ;
		// echo "Correo: " .  $Correo . "<br>";
		// echo "Pais: " .  $Pais . "<br>";
		// echo "Otro Pais: " .  $OtroPais . "<br>";
		// echo "Clave: " .  $Clave . "<br>";
		// echo "Confirmar clave: " .  $ConfirmarClave . "<br>"; 
		// echo "ID_Prueba: " .  $ID_PU . "<br>";
        
		$_SESSION["Usuario"]= $Nombre;//se crea una sesion que almacena el Nombre del usuario.

		//Se comparan ambas contraseñas
		if($Clave == $ConfirmarClave){			
			include("../conexion/Conexion_BD.php");

	    	//se cifra la contraseña con un algoritmo de encriptación
			$ClaveCifrada= password_hash($Clave, PASSWORD_DEFAULT);
			
			//Se genera un numero aleatorio para identificar al usuario
            mt_srand (time());
            $Aleatorio = mt_rand(1000000,999999999);
            //echo "Aleatorio= " . $Aleatorio . "<br>";
			
			//**********************************************************************************

			//Se insertan los datos del participante en la tabla participante, la información privada de su cuenta entra en la tabla calve_usuario 
			$insertar= "INSERT INTO usuario(nombre, correo, pais, Otro_Pais, fechaRegistro, aleatorio) VALUES('$Nombre','$Correo','$Pais','$OtroPais', NOW(), '$Aleatorio')";
			mysqli_query($conexion, $insertar) or die ("Algo ha dio mal en la consulta a la BD");

			//Se consulta en la tabla usuario el ID_Usuario del usuario que se acaba de afiliar
			$Consulta= "SELECT ID_Usuario FROM usuario WHERE aleatorio ='$Aleatorio'";
			$Recordset= mysqli_query($conexion, $Consulta); 
			$Resultado= mysqli_fetch_array($Recordset);
			$ID_Usuario= $Resultado["ID_Usuario"];
			// echo "El ID_Afiliado es= " . $ID_Participante . "<br>";

			//Se insertan los datos de acceso a la cuenta del participante en la base de datos. 
			$insertar_2= "INSERT INTO clave_usuario(ID_Usuario, clave) VALUES('$ID_Usuario', '$ClaveCifrada')";
			mysqli_query($conexion, $insertar_2);
						
			// //**********************************************************************************
			//En caso que sea un registro desde un reto terminado sin haber hecho login
			if(!empty($ID_PU)){
				$Actualizar_2 = "UPDATE pruebas_usuario SET ID_Usuario = '$ID_Usuario' WHERE ID_PU = '$ID_PU'";
				mysqli_query($conexion, $Actualizar_2);
			}

			//Se insertan los datos en la tabla de pruebas si el usuario desea registrar su reto. 
			//Si se recibe numeroAleatorio se inserta en esta tabla
			// $insertar_3= "INSERT INTO pruebas_usuario(aleatorio, ID_Usuario) VALUES('$NumeroAleatorio','$ID_Usuario')";
			// mysqli_query($conexion, $insertar_3);
		}
		else{
			echo "Fallo la confirmación de la contraseña";
			echo "<br>";
            echo "<a class='label buttonCuatro' href='javascript:history.go(-1)'>Regresar</a>"; 
			exit();
		}	?>

		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Registro</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="description" content="Juego de preguntas sobre suramerica."/>
				<meta name="keywords" content="suramerica, latinoamerica"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
				<link rel="shortcut icon" type="image/png" href="../images/logo.png">

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
			</head>
			<body style="height: 140%">
				<div class="Secundario"> 
					<div onclick= "ocultarMenu()">
						<h2 id="registro">Datos registrados</h2>
						<p class="agradecimientos"><?php echo $Nombre;?>, Hemos recibido tus datos, ahora eres miembro de la comunidad Pica-Fija.</p>
					</div>	
					<div class="nav_5">
						<a href="../vista/principal.php">Inicia sesión</a>
					</div>
				</div>
			</body>
		</html>	<?php 
	}   
	else{ // Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al formulario de registro  
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=registro.php'>";  
	} 
?>



