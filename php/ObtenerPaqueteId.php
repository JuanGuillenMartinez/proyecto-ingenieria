<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/PeticionPaquete.php";
    $idPaquete = $_POST["idPaquete"];

    $peticionPaquete = new PeticionPaquete();
    $respuesta = $peticionPaquete->obtenerPaquetePorId($idPaquete);

    echo $respuesta;
?>