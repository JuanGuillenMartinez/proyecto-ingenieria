<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/SesionCliente.php";
    $idPaquete = $_POST["idPaquete"];

    $id = SesionCliente::obtenerIdPaqueteCarrito();
    echo json_encode(array('id' => $id));
    
?>