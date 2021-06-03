<?php
    class Peticion 
    {

        private $curl = null;

        function __construct()
        {
        }

        private function iniciarCurl() {
            $this->curl = curl_init();
        }

        private function cerrarCurl() {
            curl_close($this->curl);
        }

        public function consumirPeticionPost($url, $datos) {
            $this->iniciarCurl();
            $config = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $datos,
            );
            curl_setopt_array($this->curl, $config);
            $response = curl_exec($this->curl);
            $this->cerrarCurl();
            return $response;
        }

    }

?>