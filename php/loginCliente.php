<?php

$datos = $_POST;
$correo = $datos['correo'];
$contraseña = $datos['password'];

$arreglo = array(
	'correoElectronico' => $correo,
	'contraseña' => $contraseña
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://proyecto-ing.herokuapp.com/apis/cliente/post/validar_cliente.php',
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
$obj = json_decode($response);
$idDevuelto = $obj->data->idcliente;
if($idDevuelto!=0) {
    echo "Credenciales correctas";
} else {
    echo "Credenciales incorrectas";
}