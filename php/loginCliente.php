<?php
include_once $_SERVER['DOCUMENT_ROOT']."/php//utils/Peticion.php";
include_once $_SERVER['DOCUMENT_ROOT']."/php//utils/SesionCliente.php";

SesionCliente::iniciarSesionVacia();
$datos = $_POST;
$correo = $datos['correo'];
$contraseña = $datos['password'];

$peticion = new PeticionCliente();
$respuesta = $peticion->validarCliente($correo, $contraseña);
$idDevuelto = $respuesta->data->idcliente;

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

if ($idDevuelto != 0) {
    SesionCliente::iniciarSesion($idDevuelto, $correo);
    header("Location: /index.php");
    die();
} else {
    alert("Credenciales incorrectas");
}
