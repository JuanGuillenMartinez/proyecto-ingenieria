<?php

include_once '/home/juan/Proyectos/Desarrollo web/Proyecto/php//utils/Peticion.php';

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

        public function actualizarInformacionCliente($idCliente, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono) {
            $arreglo = array(
                'idCliente' => $idCliente,
                'nombre' => $nombre,
                'apellidoPaterno' => $apellidoPaterno,
                'apellidoMaterno' => $apellidoMaterno,
                'numeroTelefono' => $telefono
            );
            $peticion = new Peticion();
            $respuesta = $peticion->consumirPeticionPost(
                "https://proyecto-ing.herokuapp.com/apis/cliente/post/actualizar_informacion_cliente.php", $arreglo
            );
            return json_decode($respuesta);
        }

    }

?>