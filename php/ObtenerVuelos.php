<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/Peticion.php";
    
    $peticion = new Peticion();
    $respuesta = $peticion->consumirPeticionGet("https://proyecto-ing.herokuapp.com/apis/vuelos/get/obtener_vuelos.php");
    
    echo $respuesta;
?>