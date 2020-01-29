<!-- Se coloca en SDN para la libreria JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php
    // Se obtiene la fotografia del usuario
	$Consulta= "SELECT Fotografia FROM usuario WHERE ID_Usuario = '$ID_Usuario'";
	$Recordset = mysqli_query($conexion,$Consulta);
    $Fotografia = mysqli_fetch_array($Recordset);
    ?>
    <label class="etiqueta_3">Inserte una imagen no mayor de 700 Kb</label>
    <label class="label_1 label_4" for="imgInp">Buscar imagen</label>
    <form action="recibe_FotoPerfil.php" method="POST" enctype="multipart/form-data" name="fotografia" autocomplete="off">
        <input type="file" id="imgInp" name="imagen" hidden/>
        <img class="imagen_8"  id="blah" alt="Fotografia del usuario" src="../images/<?php echo $Fotografia['Fotografia'];?>">
        <input class="label_1 label_5" type="submit" value="Cargar imagen">
    </form> 

<!-- Función que da una vista previa de la fotografia antes de guardarla en la B -->
<script>
    function readImage(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#blah').attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        // Código a ejecutar cuando se detecta un cambio de archivo
        readImage(this);
    });
</script>