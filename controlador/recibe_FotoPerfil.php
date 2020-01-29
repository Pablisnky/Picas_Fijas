<?php
    session_start();

    $ID_Usuario = $_SESSION["ID_Usuario"];
    // echo "ID_Usuario= " . $_SESSION["ID_Usuario"] . "<br>";
    
	//Recibo los datos de la imagen
	$nombre_img = $_FILES['imagen']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
	$tipo = $_FILES['imagen']['type'];
	$tamaño = $_FILES['imagen']['size'];
        
    // echo "Nombre de la imagen = " . $nombre_img . "<br>";
    // echo "Tipo de archivo = " .$tipo .  "<br>";
    // echo "Tamaño = " . $tamaño . "<br>";
    // echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
    // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
     
        //Si existe imagen y tiene un tamaño correcto 
        if (($nombre_img == !NULL) AND ($tamaño <= 7000000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/jpeg")
                || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal 
                //usar en remoto
                //$_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                //Usar en remoto
                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/images/'; 

                //usar en local     proyectos/controlador/recibe_FotoPerfil.php
                // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Picas_Fijas/P_F_6/images/';

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagen']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);

                //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                if(($_FILES['imagen']['name']) != ""){          
                    //Se accede al servidor de base de datos
                    include("../conexion/Conexion_BD.php");

                    $insertarImagen= "UPDATE usuario SET Fotografia='$nombre_img' WHERE ID_Usuario = '$ID_Usuario'";
                    mysqli_query($conexion, $insertarImagen);
                }
            } 
            else{
                //si no cumple con el formato
                echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                echo "<a href='FotoPerfil.php'>Regresar</a>";
                exit();
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($nombre_img == !NULL){
                echo "La imagen es demasiado grande "; 
                echo "<a href='entrada.php'>Regresar</a>";
                exit();
            }
        }
   
   header("location: entrada.php"); 