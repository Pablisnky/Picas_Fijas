<div class="">
    <!-- Se consultan los numeros ingresados y las picas y fijas -->
    <?php
        // echo "El IP del dispositivo= " . $IP . "<br>";
        // echo "El numero aleatorio es= " . $Aleatorio . "<br>";
        
        $i = 1;
        $Consulta_2= "SELECT * FROM numero_usuario WHERE IP_dispositivo = '$IP' AND numero_ale= '$Aleatorio'";
        $Recordset_2 = mysqli_query($conexion, $Consulta_2);
    ?>
    <table class="table_1">
        <thead>
            <th>Intento</th>
            <th>Numero</th>
            <th>Picas</th>
            <th>Fijas</th>
        </thead>
        <tbody><?php
        while($Resultado_2 =mysqli_fetch_array($Recordset_2)){  ?>
            <tr>
                <td class="td_1"><?php echo $i;?></td>
                <td class="td_1"><?php echo $Resultado_2["numero_usu"];?></td>
                <td class="td_1"><?php echo $Resultado_2["picas"]; ?></td>
                <td class="td_1"><?php echo $Resultado_2["fijas"] ;?></td>
            </tr>            
            <?php $i++; 
        }   ?>
        </tbody>
    </table>
    <label class="label_1" onclick="instrucciones()">Intrucciones</label>
</div>