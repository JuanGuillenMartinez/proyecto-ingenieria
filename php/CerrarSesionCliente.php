<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/php//utils/SesionCliente.php";
    SesionCliente::destruirSesion();
    echo "Sesion finalizada correctamente";

?>