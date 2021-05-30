<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="/css/estilos-informacion-cliente.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <?php

    $curl = curl_init();
    session_start();
    $correo = $_SESSION['correoUsuario'];
    $idCliente = $_SESSION['idUsuario'];
    $arreglo = array(
        'correoElectronico' => $correo,
        'idCliente' => $idCliente
    );
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://proyecto-ing.herokuapp.com/apis/cliente/post/obtener_informacion_cliente_id.php',
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

    session_start();
    $_SESSION['nombreCompleto'] = $obj->data->nombreCompleto;
    $_SESSION['nombre'] = $obj->data->nombre;
    $_SESSION['apellidoPaterno'] = $obj->data->apellidoPaterno;
    $_SESSION['apellidoMaterno'] = $obj->data->apellidoMaterno;
    $_SESSION['numeroTelefonico'] = $obj->data->numeroTelefonico;

    ?>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                </div>
                <h1 class="info">Información del Cliente</h1>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo">
                    <?php
                    session_start();
                    echo $_SESSION['nombreCompleto'];
                    ?>
                </h3>
                <p class="texto">Bienvenido!</p>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">

                    <li><i class="icono fas fa-map-signs"></i>ID de Cliente</li>
                    <li>
                        <i class="icono fas fa-map-signs"></i>
                        <?php
                        session_start();
                        echo $_SESSION['idUsuario'];
                        ?>
                    </li>

                    <li><i class="icono fas fa-phone-alt"></i>Telefono:</li>
                    <li>
                        <i class="icono fas fa-phone-alt"></i>
                        <?php
                        session_start();
                        echo $_SESSION['numeroTelefonico'];
                        ?>
                    </li>
                    <li><i class="icono fas fa-user-check"></i>Correo: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        session_start();
                        echo $_SESSION['correoUsuario'];
                        ?>
                    </li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i>Nombre: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        session_start();
                        echo $_SESSION['nombre'];
                        ?>
                    </li>

                    <li><i class="icono fas fa-map-signs"></i>Apellido Paterno: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        session_start();
                        echo $_SESSION['apellidoPaterno'];
                        ?>
                    </li>

                    <li><i class="icono fas fa-map-signs"></i>Apellido Materno: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        session_start();
                        echo $_SESSION['apellidoMaterno'];
                        ?>
                    </li>
                </ul>
            </div>
    </section>
    <!--====  End of html  ====-->
</body>

</html>