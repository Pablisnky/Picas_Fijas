<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verifica = 1906;  
	$_SESSION["verifica"] = $verifica;
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="registro de usuarios para el sitio web."/>
		<meta name="keywords" content="registro, usuarios"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="23 de enero de 2020"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosPicas_Fijas.css"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
		
		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script> 
        <script type="text/javascript" src="../javascript/Funciones_Ajax.js" ></script>	
	</head>	
	<body onload= "">
		<div class="contendor_10">
			<a class="a_1" href="../index.php">Home</a>
		</div>
		<div class="contenedor_11">
			<div onclick=""><!--ocultarMenu()-->
				<div class="contenedor_12">
					<?php
						//se recibe variable desde RetoEnd.php en el caso de que el usuario decida registrarse luego de participar
						if(!empty($_GET["ID_PU"])){
							$ID_PU= $_GET["ID_PU"];
							//  echo $ID_PU . "<br>";   ?>
								<!-- ************************************************************** -->
								<h2>¿Tienes cuenta en Picas y Fijas?</h2>
								<a class="label_1" href="principal.php?ID_PU=<?php echo $ID_PU;?>">Ingresa aquí</a>
								<hr class="hr_1">	
								
								<h2 class="h2_1">¿Aún no tienes cuenta en Picas y Fijas?</h2>
								<label class="label_1" onclick="MostrarRegistro()">Ingresa aquí</label>
								<!-- *************************************************************	 -->
								<!--contenedor actuando como ventana modal-->	
								<div class="contenedor_17" id="Contenedor_17">
									<div class="contenedor_18">
										<h2>Registro de participantes</h2>
										<form action="../controlador/recibe_Registro.php" method="POST" enctype="multipart/form-data" name="registroGratis" onsubmit="return validar_01()">
										<fieldset class="Afiliacion_3">
											<legend>Datos personales</legend> 
											
											<input type="text" name="nombre" id="Nombre" placeholder="Nombre" onchange="" autocomplete="off"><!-- return literal() se encuentra en validarFormulario.js -->
											
											<input type="text" name="correo" id="Correo" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200);" onclick="ColorearCorreo()"; autocomplete="off">
											<div class="contenedor_15" id="Mostrar_verificaCorreo"></div><!-- recibe respuesta de ajax llamar_verificaCorreo()-->
											
											<!-- <label class="etiqueta_34">Pais:</label> -->
											<select class="etiqueta_33" name="pais" id="Pais" onchange="SeleccionarRegiones(this.form)"> 
												<option>País</option>
												<option>Colombia</option>
												<option>Ecuador</option>
												<option>Venezuela</option>
												<option>Otro</option>
											</select>  
										</fieldset>        
										<fieldset class="Afiliacion_3">
											<legend>Datos de accceso a la plataforma</legend>  
											<div>
												<input type="password" name="clave" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave()">
												<div class="contenedor_11" id="Mostrar_verificaClave"></div><!-- recibe respuesta de ajax llamar_verificaClave()-->
												<input type="password" name="confirmarClave" id="ConfirmarClave" placeholder="Repetir contraseña">
											</div>             
											<input type="text" name="ID_PU" value="<?php echo $ID_PU;?>" hidden>           
											<input class="label_1 label_4" type="submit" name="Registrarse" value="Registrarse" style=" display: block; width: 120px;">
										</fieldset> 
									</form>
									</div>
								</div>
							<?php
						} 
						else{//Entra aqui cuando el usuario se va a registrar sin antes haber participado en un reto}
							?>
							<h2>Registro de participantes</h2>
							<form action="../controlador/recibe_Registro.php" method="POST" enctype="multipart/form-data" name="registroGratis" onsubmit="return validar_01()">
								<fieldset class="Afiliacion_4">
									<legend>Datos personales</legend> 
									
									<input type="text" name="nombre" id="Nombre" placeholder="Nombre" onchange="" autocomplete="off"><!-- return literal() se encuentra en validarFormulario.js -->
									
									<input type="text" name="correo" id="Correo" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200);" onclick="ColorearCorreo()"; autocomplete="off">
									<div class="contenedor_15" id="Mostrar_verificaCorreo"></div><!-- recibe respuesta de ajax llamar_verificaCorreo()-->
									
									<!-- <label class="etiqueta_34">Pais:</label> -->
									<select class="etiqueta_33" name="pais" id="Pais" onchange="SeleccionarRegiones(this.form)"> 
										<option>País</option>
										<option>Colombia</option>
										<option>Ecuador</option>
										<option>Venezuela</option>
										<option>Otro</option>
									</select>  
								</fieldset>        
								<fieldset class="Afiliacion_4 Afiliacion_5">
									<legend>Datos de accceso a la plataforma</legend>  
									<div>
										<input type="password" name="clave" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave()">
										<div class="contenedor_11" id="Mostrar_verificaClave"></div><!-- recibe respuesta de ajax llamar_verificaClave()-->
										<input type="password" name="confirmarClave" id="ConfirmarClave" placeholder="Repetir contraseña">
									</div>                        
									<input class="label_1 label_4" type="submit" name="Registrarse" value="Registrarse" style=" display: block; width: 120px;">
								</fieldset> 
							</form>
							<?php
					} ?>
				</div>
			</div>
		</div>
	</body>
</html>