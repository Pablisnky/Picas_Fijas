<?php
	include("../conexion/Conexion_BD.php");
	
	//Se verifica si el usuario esta memorizado en las cookie de su computadora y las compara con la BD, para recuperar sus datos y autorellenar el formulario de inicio de sesion, las cookies de registro de usuario se crearon en validarSesion.php
	if(isset($_COOKIE["id_usuario"]) AND isset($_COOKIE["clave"])){//Si la variable $_COOKIE esta establecida o creada
	    $Cookie_usuario = $_COOKIE["id_usuario"];
		$Cookie_clave = $_COOKIE["clave"];
		// echo "Cookie usuario =" . $Cookie_usuario ."<br>";
		// echo "Cookie clave =" .  $Cookie_clave ."<br>";
		
		//se entra aqui para recuperar la informacion del usuario y autorellenar el formulario
    	if($_COOKIE["id_usuario"]!="" || $_COOKIE["clave"]!=""){
			$Consulta_1 = "SELECT * FROM usuario WHERE ID_Usuario= '$Cookie_usuario' ";
			$Recordset= mysqli_query($conexion, $Consulta_1);
			$Autorizado= mysqli_fetch_array($Recordset);
			$email = $Autorizado["correo"];
			// echo "Correo guardado en cookie= " . $email ."<br>";
		}	?>
		<!DOCTYPE html>
		<html lang="es">
		<head>
			<title>horebi login</title>

			<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
			<meta name="description" content="Juego de picas y fijas."/>
			<meta name="keywords" content="juego, analisis, picas, fijas"/>
			<meta name="author" content="Pablo Cabeza"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="MobileOptimized" content="width">
			<meta name="HandheldFriendly" content="true">
			<meta http-equiv="expires" content="23 de enero de 2020"><!--Inicio de construcción de la página-->

			<link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas.css"/>
			<link rel="stylesheet" type="text/css" href="../css/MediaQuery_EstilosPicas_Fijas_320.css"/>
			<link rel="stylesheet" type="text/css" href="css/MediaQuery_EstilosPicas_Fijas.css"/>
			<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

			<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script> 
		</head>	
		<body onload="autofocusInicioSesion()">
			<div class="contendor_10">
				<a class="a_1" href="participantes.php">Participantes</a>
				<a class="a_1" href="../index.php">Home</a>
			</div>
			<div class="contenedor_11">
				<div onclick= "ocultarMenu()">
					<?php
						//se recibe variable desde RetoEnd.php en el caso de que el usuario decida registrarse luego de participar
						if(!empty($_GET["ID_PU"])){
							$ID_PU= $_GET["ID_PU"];
							// echo $ID_PU . "<br>";   ?>
							<div class="contenedor_12">
								<h2>Inicia sesión</h2>
								<form action="../controlador/validarSesion.php" method="POST">
									<fieldset class="Afiliacion_4">
										<!-- el formulario se autorellena con la informacion recuperada de la BD porque existian las cookies-->
										<br>
										<input style="margin-bottom: 2%; " type="email" name="correo" id="Correo" value="<?php if (isset($email)) echo $email;?>">

										<input style="margin-bottom: 2%; " type="password" name="clave" id="Clave" value="<?php if (isset($Cookie_clave)) echo $Cookie_clave ;?>">
										<div class="contenedor_13">
											<div>
												<input type="checkbox" id="Recordar" name="recordar" value="1">	
													
												<label class="recordar" for="Recordar">Recordar datos en este equipo.</label>
											</div>
										</div>

										<input type="text" name="reto" value="<?php echo $ID_PU;?>" hidden>
										<input class="label_1 label_4" type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
										<hr>
										<p class="parrafo_1">¿Olvidaste tu contraseña <span class="span_1">Picas y Fijas</span> ?
										<label class="label_2" onclick="NotificarContrasena()">Recuperala</label></p>
									</fieldset>
								</form>
							</div>	
							<?php
						}
						else{//se entra aqui cuand el usuario se va a registrar sin haber participado
							?>
									<div class="contenedor_12">
										<h2>Inicia sesión</h2>
										<form action="../controlador/validarSesion.php" method="POST">
											<fieldset class="Afiliacion_4">
												<!-- el formulario se autorellena con la informacion recuperada de la BD porque existian las cookies-->
												<br>
												<input style="margin-bottom: 2%; " type="email" name="correo" id="Correo" value="<?php if (isset($email)) echo $email;?>">

												<input style="margin-bottom: 2%; " type="password" name="clave" id="Clave" value="<?php if (isset($Cookie_clave)) echo $Cookie_clave ;?>">
												<div class="contenedor_13">
													<div>
														<input type="checkbox" id="Recordar" name="recordar" value="1">	
													
														<label class="recordar" for="Recordar">Recordar datos en este equipo.</label>
													</div>
												</div>
								
												<input class="label_1 label_4" type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
												<hr>
												<p class="parrafo_1">¿Olvidaste tu contraseña <span class="span_1">Picas y Fijas</span> ?
												<label class="label_2" onclick="NotificarContrasena()">Recuperala</label></p>
											</fieldset>
										</form>
									</div>	
									<p class="parrafo_1">¿No tienes cuenta en <span class="span_1">Picas y Fijas</span> ?<br>
									<a class="label_2" href="registro.php">Registrate</a></p> 		
										</div>  
										<div class="contenedor_16"  id="Contenedor_16">
											<form action="../controlador/recibeCorreo.php" method="POST" autocomplete="off"> 
												<fieldset class="Afiliacion_4" style="background-color: #F4FCFB; border-radius: 15px;">
													<p class="span_9">Indiquenos un correo al cual podamos enviarle un código de recuperación</p>
													<br>
													<input class="etiqueta_35" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
													<input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
												</fieldset>
											</form>       
										</div> 
										<div class="tapa_2" id="Tapa_2" onclick="quitarTapa_2()"></div><!--Este Div es la parte oscura, quitarTapa_2() esta al final de este archivo-->
									</div>
									<?php
					}	?>
		</body>
	</html>
		<?php
	}	
	else{ //Si el usuario no activo el recordatorio de usuario y contraseña entra aqui?>	









<!DOCTYPE html>
		<html lang="es">
		<head>
			<title>horebi login</title>

			<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
			<meta name="description" content="Juego de picas y fijas."/>
			<meta name="keywords" content="juego, analisis, picas, fijas"/>
			<meta name="author" content="Pablo Cabeza"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="MobileOptimized" content="width">
			<meta name="HandheldFriendly" content="true">
			<meta http-equiv="expires" content="23 de enero de 2020"><!--Inicio de construcción de la página-->

			<link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas.css"/>
			<link rel="stylesheet" type="text/css" href="../css/MediaQuery_EstilosPicas_Fijas_320.css"/>
			<link rel="stylesheet" type="text/css" href="css/MediaQuery_EstilosPicas_Fijas.css"/>
			<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

			<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script> 
		</head>	
		<body onload="autofocusInicioSesion()">
			<div class="contendor_10">
				<a class="a_1" href="participantes.php">Participantes</a>
				<a class="a_1" href="../index.php">Home</a>
			</div>
			<div class="contenedor_11">
				<div onclick= "ocultarMenu()">
					<?php
						//se recibe variable desde RetoEnd.php en el caso de que el usuario decida registrarse luego de participar
						if(!empty($_GET["ID_PU"])){
							$ID_PU= $_GET["ID_PU"];
							// echo $ID_PU . "<br>";   ?>
							<div class="contenedor_12">
								<h2>Inicia sesión</h2>
								<form action="../controlador/validarSesion.php" method="POST">
									<fieldset class="Afiliacion_4">
										<input style="margin-bottom: 2%;" type="email" name="correo" id="Correo" placeholder="e-mail">

										<input style="margin-bottom: 2%; " type="password" name="clave" id="Clave" placeholder="Contraseña">
										<div class="contenedor_13">
											<div>
												<input type="checkbox" id="Recordar" name="recordar" value="1">	
													
												<label class="recordar" for="Recordar">Recordar datos en este equipo.</label>
											</div>
										</div>

										<input type="text" name="reto" value="<?php echo $ID_PU;?>" hidden>
										<input class="label_1 label_4" type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
										<hr>
										<p class="parrafo_1">¿Olvidaste tu contraseña <span class="span_1">Picas y Fijas</span> ?
										<label class="label_2" onclick="NotificarContrasena()">Recuperala</label></p>
									</fieldset>
								</form>
							</div>	
							<?php
						}
						else{//se entra aqui cuando el usuario se va a registrar sin haber participado
							?>
									<div class="contenedor_12">
										<h2>Inicia sesión</h2>
										<form action="../controlador/validarSesion.php" method="POST">
											<fieldset class="Afiliacion_4">
												<input style="margin-bottom: 2%;" type="email" name="correo" id="Correo" placeholder="e-mail">

												<input style="margin-bottom: 2%; " type="password" name="clave" id="Clave" placeholder="Contraseña">
												<div class="contenedor_13">
													<div>
														<input type="checkbox" id="Recordar" name="recordar" value="1">	
													
														<label class="recordar" for="Recordar">Recordar datos en este equipo.</label>
													</div>
												</div>
								
												<input class="label_1 label_4" type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
												<hr>
												<p class="parrafo_1">¿Olvidaste tu contraseña <span class="span_1">Picas y Fijas</span> ?
												<label class="label_2" onclick="NotificarContrasena()">Recuperala</label></p>
											</fieldset>
										</form>
									</div>	
									<p class="parrafo_1">¿No tienes cuenta en <span class="span_1">Picas y Fijas</span> ?<br>
									<a class="label_2" href="registro.php">Registrate</a></p> 		
										</div>  
										<div class="contenedor_16"  id="Contenedor_16">
											<form action="../controlador/recibeCorreo.php" method="POST" autocomplete="off"> 
												<fieldset class="Afiliacion_4" style="background-color: #F4FCFB; border-radius: 15px;">
													<p class="span_9">Indiquenos un correo al cual podamos enviarle un código de recuperación</p>
													<br>
													<input class="etiqueta_35" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
													<input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
												</fieldset>
											</form>       
										</div> 
										<div class="tapa_2" id="Tapa_2" onclick="quitarTapa_2()"></div><!--Este Div es la parte oscura, quitarTapa_2() esta al final de este archivo-->
									</div>
									<?php
					}	
					}	?>
    