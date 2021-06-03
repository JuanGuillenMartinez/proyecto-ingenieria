<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="/css/estilos-informacion-cliente.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <?php include '/home/juan/Proyectos/Desarrollo web/Proyecto/php//utils/SesionCliente.php'; ?>
</head>

<body>
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
                    echo SesionCliente::obtenerInformacionSesionId('nombreCompleto');
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
                        echo SesionCliente::obtenerInformacionSesionId('idUsuario');
                        ?>
                    </li>

                    <li><i class="icono fas fa-phone-alt"></i>Telefono:</li>
                    <li>
                        <i class="icono fas fa-phone-alt"></i>
                        <?php
                        echo SesionCliente::obtenerInformacionSesionId('numeroTelefonico');
                        ?>
                    </li>
                    <li><i class="icono fas fa-user-check"></i>Correo: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        echo SesionCliente::obtenerInformacionSesionId('correoUsuario');
                        ?>
                    </li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i>Nombre: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        echo SesionCliente::obtenerInformacionSesionId('nombre');
                        ?>
                    </li>

                    <li><i class="icono fas fa-map-signs"></i>Apellido Paterno: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        echo SesionCliente::obtenerInformacionSesionId('apellidoPaterno');
                        ?>
                    </li>

                    <li><i class="icono fas fa-map-signs"></i>Apellido Materno: </li>
                    <li>
                        <i class="icono fas fa-user-check"></i>
                        <?php
                        echo SesionCliente::obtenerInformacionSesionId('apellidoMaterno');
                        ?>
                    </li>
                </ul>
            </div>
    </section>
    <!--====  End of html  ====-->
</body>

</html>