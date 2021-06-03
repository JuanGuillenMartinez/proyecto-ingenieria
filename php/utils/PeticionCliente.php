<?php

    class PeticionCliente {

        function __construct()
        {
            
        }

        public function validarCliente($correo, $contraseña) {
            $arreglo = array(
                'correoElectronico' => $correo,
                'contraseña' => $contraseña
            );
            $peticion = new Peticion();
            $respuesta = $peticion->consumirPeticionPost(
                "https://proyecto-ing.herokuapp.com/apis/cliente/post/validar_cliente.php", $arreglo
            );
            return json_decode($respuesta);
        }

        public function obtenerInformacionCliente($idCliente, $correo) {
            $arreglo = array(
                'correoElectronico' => $correo,
                'idCliente' => $idCliente
            );
            $peticion = new Peticion();
            $respuesta = $peticion->consumirPeticionPost(
                "https://proyecto-ing.herokuapp.com/apis/cliente/post/obtener_informacion_cliente_id.php", $arreglo
            );
            return json_decode($respuesta);
        }

    }

?>