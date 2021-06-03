<?php
include '/home/juan/Proyectos/Desarrollo web/Proyecto/php//utils/PeticionCliente.php';
class SesionCliente
{
    public static function abrirSesion()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function iniciarSesionVacia()
    {
        SesionCliente::abrirSesion();
        $_SESSION['nombreCompleto'] = 'indefinido';
        $_SESSION['nombre'] = 'indefinido';
        $_SESSION['apellidoPaterno'] = 'indefinido';
        $_SESSION['apellidoMaterno'] = 'indefinido';
        $_SESSION['numeroTelefonico'] = 'indefinido';
        $_SESSION['idUsuario'] = '0';
        $_SESSION['correoUsuario'] = 'indefinido';
    }

    public static function iniciarSesion($idCliente, $correo) {
        SesionCliente::abrirSesion();
        $peticion = new PeticionCliente();
        $datosCliente = $peticion->obtenerInformacionCliente($idCliente, $correo);
        $_SESSION['nombreCompleto'] = $datosCliente->data->nombreCompleto;
        $_SESSION['nombre'] = $datosCliente->data->nombre;
        $_SESSION['apellidoPaterno'] = $datosCliente->data->apellidoPaterno;
        $_SESSION['apellidoMaterno'] = $datosCliente->data->apellidoMaterno;
        $_SESSION['numeroTelefonico'] = $datosCliente->data->numeroTelefonico;
        $_SESSION['idUsuario'] = $idCliente;
        $_SESSION['correoUsuario'] = $datosCliente->data->correoElectronico;
    }

    public static function destruirSesion()
    {
        //Asigna la sesion en vacio
        $_SESSION = array();
        //se destruyen las cookies
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        // se destruye la sesión.
        session_destroy();
    }

    public static function obtenerInformacionSesionId($id)
    {
        SesionCliente::abrirSesion();
        $dato = $_SESSION[$id];
        return $dato;
    }



}
