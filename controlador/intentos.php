<?php
//Archivo introducido por Ajax a traves del index.php al llamr la funcion llamar_evaluar
    session_start();
    
    // es solo un requisito para que pueda funciona la tecnica ajax; $Num_Intentos no es importante 
	$Num_Intentos= $_GET["val_1"];
	// echo "Cantidad de intentos = " .  $Num_Intentos . "<br>";
    
	//Se llama al numero aleatorio desde la sesion creada en recibe_Index.php
		// if(!empty($NumberAle)){		
			$NumberAle = $_SESSION["Numero_Alea"];
		// 	echo "numero aleatorio = " . $NumberAle . "<br>";
		// }
		// else{
		// 	$NumberAle = 0;
		// }
    
    //Se accede al servidor de base de datos
    include("../conexion/Conexion_BD.php");

    //Se consulta en la BD el numero de intentos que lleva un participante
	$Consulta_5="SELECT ID_NU FROM numero_usuario WHERE numero_ale='$NumberAle'";
	$Recordset_5 = mysqli_query($conexion, $Consulta_5) or die (mysqli_error($conexion));
	$Intento= mysqli_num_rows($Recordset_5);//se suman los registros que tiene la consulta realizada.
	// echo "Intentos: " . $Intento;

    switch($Intento){
		case "0":
		$Oportunidad= "1er";
		break;
		case "1":
		$Oportunidad= "2do";
		break;
		case "2":
		$Oportunidad= "3er";
		break;
		case "3":
		$Oportunidad= "4to";
		break;
		case "4":
		$Oportunidad= "5to";
		break;
		case "5":
		$Oportunidad= "6to";
		break;
		case "6":
		$Oportunidad= "7mo";
		break;
		case "7":
		$Oportunidad= "8vo";
		break;
		case "8":
		$Oportunidad= "9no";
		break;
		case "9":
		$Oportunidad= "10mo";
		break;
		case "10":
        $Oportunidad= "11";
        include("RetoEnd.php");
		break;
	}

	if($Oportunidad != 11){	?>
		<label class='label_1' id='Requisito' onclick='ValidaNumero(); llamar_evaluar(); setTimeout(limpiar,100)'><?php echo $Oportunidad . " " . "intento";?></label>	<?php
	}
	
?>
		
	<input type="text" id="Requisito" name="requisito" value="intentos" hidden >
				
	<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>