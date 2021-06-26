<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/Peticion.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/SesionCliente.php";
    
    session_start();
    $idPaquete = $_POST["idPaquete"];
    $idCliente = $_SESSION['idUsuario'];
    $datos = array(
        "idPaquete" => $idPaquete,
        "idCliente" => $idCliente
    );
    $peticion = new Peticion();
    $respuesta = $peticion->consumirPeticionPost("https://proyecto-ing.herokuapp.com/apis/carrito/post/agregar_paquete_carrito.php", $datos);

    echo json_encode($respuesta);
?>