<?php
        session_start(); //Se reanuda la sesion abierta en validarSesion.php
        session_unset();      
        session_destroy();
        echo '<script type="text/javascript">window.location.href="../index.php";</script>';
    ?>