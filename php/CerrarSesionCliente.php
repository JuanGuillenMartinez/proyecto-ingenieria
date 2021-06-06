<?php
    include_once '/app/php//utils/SesionCliente.php';
    SesionCliente::destruirSesion();
    echo "Sesion finalizada correctamente";

?>