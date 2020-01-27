
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>horebi login</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas biblicas."/>
				<meta name="keywords" content="citas biblicas, biblia"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="23 de enero de 2020"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas.css"/>
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script> 
			</head>	
			<body onload="autofocusInicioSesion()">
				<div class="contenedor_11">
					<div onclick= "ocultarMenu()">
						<div class="contenedor_12">
							<h2>Inicia sesión</h2>
							<form action="../controlador/validarSesion.php" method="POST">
								<fieldset class="Afiliacion_4">
									<input type="email" name="correo" id="Correo" placeholder="e-mail" autocomplete="off">
									<input type="password" name="clave" id="Clave" placeholder="Contraseña" autocomplete="off">
									<div class="contenedor_13">
										<div>
											<input type="checkbox" id="Recordar" name="recordar" value="1">	
										
											<label class="recordar" for="Recordar">Recordar datos en este equipo.</label>
										</div>
									</div>
					
									<input class="input_3" type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
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
			</body>
        </html>		
    