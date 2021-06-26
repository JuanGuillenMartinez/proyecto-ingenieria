<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/SesionCliente.php";
    
    $id = SesionCliente::obtenerIdPaqueteCarrito();
    echo json_encode(array('id' => $id));
    
?>