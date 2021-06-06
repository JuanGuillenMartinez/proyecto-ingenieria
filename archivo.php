<?php

include_once '/home/juan/Proyectos/Desarrollo web/Proyecto/php//utils/PeticionCliente.php';
include_once '/home/juan/Proyectos/Desarrollo web/Proyecto/php//utils/SesionCliente.php';

$datos = $_POST;
$idCliente = $datos['idCliente'];
$nombre = $datos['nombre'];
$apellidoPaterno = $datos['apellidoPaterno'];
$apellidoMaterno = $datos['apellidoMaterno'];
$telefono = $datos['telefono'];
$correo = $datos['correo'];

$peticion = new PeticionCliente();
$respuesta = $peticion->actualizarInformacionCliente($idCliente, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono);

if ($respuesta->data == "true") {
    SesionCliente::iniciarSesion($idCliente, $correo);
    echo $respuesta->estado;
}

?>