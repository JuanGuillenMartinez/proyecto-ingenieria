<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/PeticionPaquete.php";
    $peticion = new PeticionPaquete();
    $resultado = $peticion->obtenerPaquetes();
    //echo $resultado["data"][0]["nombre_paquete"];
    echo $resultado;
?>