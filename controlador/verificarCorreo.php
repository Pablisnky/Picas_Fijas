<?php
	include("../conexion/Conexion_BD.php");
	
	$Correo= $_GET["val_1"];//recibe la direccion de correo desde Funciones_varias.js

		//se prepara una consulta para verificar si existe una direccion de correo igual en la BD
		$Consulta= "SELECT * FROM usuario WHERE Correo= '$Correo'";
	    $Recordset= mysqli_query($conexion,$Consulta);
		$VerificarCorreo= mysqli_fetch_array($Recordset);

		if(($VerificarCorreo["correo"]) == $Correo){ 
			echo "<p class='anuncio'>La dirección de correo electronico ya existe<p>";	      
		}  
		
?>
