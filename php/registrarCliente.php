<?php

$datos = $_POST;

$nombreCliente = $datos['nombreCliente'];
$apellidoPaterno = $datos['apellidoPaterno'];
$apellidoMaterno = $datos['apellidoMaterno'];
$correo = $datos['correo'];
$numeroTelefono = $datos['numeroTelefono'];
$contraseña = $datos['contraseña'];

$curl = curl_init();

$arreglo = array(
    'nombreCliente' => $nombreCliente,
    'apellidoPaterno' => $apellidoPaterno,
    'apellidoMaterno' => $apellidoMaterno,
    'correoElectronico' => $correo,
    'numeroTelefono' => $numeroTelefono,
    'contraseña' => $contraseña
);

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://proyecto-ing.herokuapp.com/apis/cliente/post/registrar_cliente.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $arreglo,
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
