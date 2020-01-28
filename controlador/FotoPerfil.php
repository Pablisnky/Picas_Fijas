<!-- Se coloca en SDN para la libreria JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <legend>Fotografia de perfil</legend>
    <label class="etiqueta_3">Inserte una imagen no mayor de 700 Kb</label>
    <!-- <label class="label_1" for="imgInp">Buscar imagen</label> -->
    <input type="file" id="imgInp" name="imagen"/>
    <img class="imagen_8"  id="blah" alt="Fotografia del usuario" src="../images/<?php echo $Usuario['Fotografia'];?>">
    <!-- <a href="../controlador/EliminarFotoPerfil.php?FotoPerfil=<?php// echo $Usuario['fotografia'];?>" onclick="return Confirmacion()">Eliminar</a> es necesario mandar el nombre de la categoria para saber a que tipo de perfil redireccionar despues de eliminar la fotografia--> 


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