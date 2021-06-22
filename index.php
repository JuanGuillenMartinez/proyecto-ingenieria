<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/banner/logo.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Descripcion -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Titulo -->
    <title>TRAVEL MEX</title>
    <!--
		Exportar CSS
		============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/php//utils/SesionCliente.php"; ?>

</head>

<body>

    <!-- Inicia header  -->

    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">

                    <!-- Marca y alternar se agrupan para una mejor visualización móvil -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/banner/logo.png" width="100" height="100" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Menu-->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Alojamiento</a></li>
                            <li class="nav-item"><a class="nav-link" href="#paquetes">Paquetes</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Autos</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Traslados</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Seguro de viajes</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="/loginvista.html">
                                    <?php
                                    $idUsuario = SesionCliente::obtenerInformacionSesionId('idUsuario');
                                    if ($idUsuario == "0" or empty($_SESSION['idUsuario'])) {
                                        echo "Iniciar Sesión";
                                    } else {
                                        echo SesionCliente::obtenerInformacionSesionId('nombre');
                                    }
                                    ?>
                                </a>
                            </li>
                        </ul>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item">
                                <a href="/cart.html" class="cart"><span class="ti-bag"></span></a>
                            </li>
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                            <li class="nav-item">
                                <a href="/vista_informacion_cliente.php" class="cart"><span class="fas fa-user icon"></span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        </div>
        </div>
        </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Busca aqui">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Termina Header -->

    <!-- Inicia banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>VACACIONES SEGURAS <br> </h1>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="vacaciones">
                                    <img class="" src="" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                        <div class="row single-slide">
                            <div class="col-lg-5">
                                <div class="banner-content">
                                    <h1>VUELOS SEGUROS <br></h1>
                                    <p></p>
                                    <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                    <span class="add-text text-uppercase"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="vacaciones">
                                <img class="" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End banner Area -->
    
    <!-- modal informacion paquete -->
    <div class="modal fade" id="modalInformacionPaquete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo-modal" class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row justify-content-center form-group">
                            <img id="img-paquete-modal" src="" alt="imagen del paquete" width="200" height="140px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre del paquete</label>
                            <input id="input-nombre-paquete" size="5" readonly="true" type="text" class="form-control" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Origen</label>
                            <input id="input-origen" readonly="true" type="text" class="form-control" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Destino</label>
                            <input id="input-destino" readonly="true" type="text" class="form-control" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Precio del paquete</label>
                            <input id="input-precio" readonly="true" type="text" class="form-control" aria-describedby="emailHelp" placeholder="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="btnAgregarCarrito" type="button" class="btn btn-primary">Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin modal informacion paquete -->
    <!--  -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!--  -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Llevamos tus maletas</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Politica de Devoluciones</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon3.png" alt="">
                        </div>
                        <h6>24/7 Soporte</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon4.png" alt="">
                        </div>
                        <h6>Pagos Seguros</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- start product Area -->
    <section id="paquetes" class="xd">
        <!-- single product slide -->
        <ul class="bxslider">

        </ul>

    </section>
    <!-- end product Area -->

    <style>
        .modal-title {
            color: black;
        }
        .bx-wrapper img {
            margin: 0 auto;
        }

        .bx-wrapper title {
            margin: 0 auto;
        }
    </style>
    <!-- Start exclusive deal Area -->
    <section class="exclusive-deal-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1>Vuelos en caliente!</h1>
                            <p>Visita ya tu lugar favorito!.</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row clock-wrap">
                                <div class="col clockinner1 clockinner">
                                    <h1 class="days">150</h1>
                                    <span class="smalltext">Dias</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="hours">23</h1>
                                    <span class="smalltext">Horas</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="minutes">47</h1>
                                    <span class="smalltext">Minutos</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="seconds">59</h1>
                                    <span class="smalltext">Segundos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="primary-btn">Comprar ahora</a>
                    <!-- End exclusive deal Area -->



                    <!-- End footer Area -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
                    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                    <script src="js/vendor/bootstrap.min.js"></script>
                    <script src="js/jquery.ajaxchimp.min.js"></script>
                    <script src="js/jquery.nice-select.min.js"></script>
                    <script src="js/jquery.sticky.js"></script>
                    <script src="js/nouislider.min.js"></script>
                    <script src="js/countdown.js"></script>
                    <script src="js/jquery.magnific-popup.min.js"></script>
                    <script src="js/owl.carousel.min.js"></script>
                    <!--gmaps Js-->
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
                    <script src="js/gmaps.min.js"></script>
                    <script src="js/main.js"></script>
                    <script src="js/functions.js"></script>
</body>

</html>