<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="/css/estilos-informacion-cliente.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/php/utils/SesionCliente.php"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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

                    <li><i class="icono fas fa-user-check"></i>ID de Cliente</li>
                    <li>
                        <input id="idUsuario" disabled type="text" placeholder="<?php echo SesionCliente::obtenerInformacionSesionId('idUsuario'); ?>">
                    </li>

                    <li><i class="icono fas fa-phone-alt"></i>Telefono:</li>
                    <li>
                        <input id="telefono" type="text" placeholder="<?php
                                                                        echo SesionCliente::obtenerInformacionSesionId('numeroTelefonico');
                                                                        ?>">
                    </li>
                    <li><i class="icono fas fa-user-check"></i>Correo: </li>
                    <li>
                        <input disabled id="correo" type="text" placeholder="<?php
                                                                                echo SesionCliente::obtenerInformacionSesionId('correoUsuario');
                                                                                ?>">
                    </li>
                    <li><button class="btnCerrarSesion" onclick="cerrarSesion()" name="btnGuardar">Cerrar Sesion</button></li>
                    <script>
                        function cerrarSesion() {
                            $.ajax({
                                url: "/php/CerrarSesionCliente.php",
                                success: function(data) {
                                    alert(data);
                                    $(location).attr('href', '/index.php');
                                }
                            });
                        }
                    </script>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-user-check"></i>Nombre: </li>
                    <li>
                        <input id="nombre" type="text" placeholder="<?php
                                                                    echo SesionCliente::obtenerInformacionSesionId('nombre');
                                                                    ?>">
                    </li>

                    <li><i class="icono fas fa-user-check"></i>Apellido Paterno: </li>
                    <li>
                        <input id="apellidoPaterno" type="text" placeholder="<?php
                                                                                echo SesionCliente::obtenerInformacionSesionId('apellidoPaterno');
                                                                                ?>">
                    </li>

                    <li><i class="icono fas fa-user-check"></i>Apellido Materno: </li>
                    <li>
                        <input id="apellidoMaterno" type="text" placeholder="<?php
                                                                                echo SesionCliente::obtenerInformacionSesionId('apellidoMaterno');
                                                                                ?>">
                    </li>
                    <li><button onclick="funcion()" name="btnGuardar">Guardar</button></li>
                    <script>
                        function funcion() {
                            var correo = document.getElementById("correo").placeholder;
                            var idCliente = document.getElementById("idUsuario").placeholder;
                            var telefono = document.getElementById("telefono").value;
                            var nombre = document.getElementById("nombre").value;
                            var apellidoPaterno = document.getElementById("apellidoPaterno").value;
                            var apellidoMaterno = document.getElementById("apellidoMaterno").value;
                            if (telefono == "") {
                                telefono = document.getElementById("telefono").placeholder;
                            }
                            if (nombre == "") {
                                nombre = document.getElementById("nombre").placeholder;
                            }
                            if (apellidoPaterno == "") {
                                apellidoPaterno = document.getElementById("apellidoPaterno").placeholder;
                            }
                            if (apellidoMaterno == "") {
                                apellidoMaterno = document.getElementById("apellidoMaterno").placeholder;
                            }
                            var param = {
                                idCliente: idCliente,
                                telefono: telefono,
                                nombre: nombre,
                                apellidoPaterno: apellidoPaterno,
                                apellidoMaterno: apellidoMaterno,
                                correo: correo
                            };

                            $.ajax({
                                data: param,
                                url: "/php/ActualizarInformacionClientes.php",
                                method: "post",
                                success: function(data) {
                                    alert(data);
                                    location.reload();
                                }
                            });
                        }
                    </script>
                </ul>
            </div>
    </section>
    <!--====  End of html  ====-->
</body>

</html>