<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/Peticion.php";
    
    session_start();
    $idCliente = $_SESSION['idUsuario'];
    $datos = array(
        "idCliente" => $idCliente
    );
    $peticion = new Peticion();
    $respuesta = $peticion->consumirPeticionPost("https://proyecto-ing.herokuapp.com/apis/carrito/post/obtener_carrito_id.php", $datos);
    
    echo $respuesta;
    
?>