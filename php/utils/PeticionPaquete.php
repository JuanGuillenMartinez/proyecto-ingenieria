<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/Peticion.php";
    class PeticionPaquete {

        function __construct()
        {
            
        }

        public function obtenerPaquetes() {
            $peticion = new Peticion();
            $respuesta = $peticion->consumirPeticionGet("https://proyecto-ing.herokuapp.com/apis/paquete/get/obtener_paquetes.php");
            return $respuesta;
        }

        public function obtenerPaquetePorId($id) {
            $peticion = new Peticion();
            $datos = array('idPaquete' => $id);
            $respuesta = $peticion->consumirPeticionPost("https://proyecto-ing.herokuapp.com/apis/paquete/post/obtener_informacion_paquete_id.php", $datos);
            return $respuesta;
        }

    }
?>