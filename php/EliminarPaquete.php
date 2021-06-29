<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/Peticion.php";
    $idPaquete = intval($_POST["idPaquete"]);

    $datos = array('idPaquete' => $idPaquete);
    $peticion = new Peticion();
    $respuesta = $peticion->consumirPeticionPost("https://proyecto-ing.herokuapp.com/apis/paquete/post/eliminar_paquete.php", $datos);
    
    echo $respuesta;