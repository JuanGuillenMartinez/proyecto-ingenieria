<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/SesionCliente.php";
    $idPaquete = $_POST["idPaquete"];

    SesionCliente::guardarPaqueteCarrito($idPaquete);
    
?>