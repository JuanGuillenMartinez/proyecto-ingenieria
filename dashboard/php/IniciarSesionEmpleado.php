<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/Peticion.php";
    
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $datos = array(
        "correoElectronico" => $correo,
        "contraseña" => $contraseña
    );
    $peticion = new Peticion();
    $respuesta = $peticion->consumirPeticionPost("https://proyecto-ing.herokuapp.com/apis/empleado/post/validar_empleado.php", $datos);
    
    echo $respuesta;
    
?>