<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/Peticion.php";
    $idPaquete = $_POST["idPaquete"];
    $nombrePaquete = $_POST["nombrePaquete"];
    $precioPaquete = $_POST["precioPaquete"];
    $idAerolinea =$_POST["idAerolinea"];
    $idAlojamiento = $_POST["idAlojamiento"];
    $idTraslado = $_POST["idTraslado"];
    $descuento = $_POST["descuento"];
    $precioFinal = $_POST["precioFinal"];
    $urlImagen = $_POST["urlImagen"];

    $datos = array(
            'idPaquete' => $idPaquete,
            'nombrePaquete' => $nombrePaquete,
            'precioPaquete' => $precioPaquete,
            'idAerolinea' => $idAerolinea,
            'idAlojamiento' => $idAlojamiento,
            'idTraslado' => $idTraslado,
            'descuento' => $descuento,
            'precioFinal' => $precioFinal,
            'urlImagen' => $urlImagen
    );
    $peticion = new Peticion();
    $respuesta = $peticion->consumirPeticionPost("https://proyecto-ing.herokuapp.com/apis/paquete/post/editar_paquete.php", $datos);
    
    echo $respuesta;
