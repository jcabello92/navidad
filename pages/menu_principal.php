<!DOCTYPE html>
<html lang="es">
    <!-- INICIO HEAD -->
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    
        <title>Sistema Navidad Curicó</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
        <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="../css/main.css"/>

        <!-- JS -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>
        <script src="../js/rut.js"></script>
    </head>
    <!-- FIN HEAD -->

    <!-- INICIO VARIABLES DE SESIÓN -->
    <?php
        /*if($_SESSION['usuario'] != '') // CAMBIAR
        {
            header("Location: inicio.php");
        }*/

        function avanzar($usuario, $contrasena)
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['contrasena'] = $contrasena;
            $_SESSION['pag_anterior'] = 'menu_principal.php';
        }
    ?>
    <!-- FIN VARIABLES DE SESIÓN -->

    <!-- INICIO BODY -->
    <body class="g-sidenav-show bg-gray-100">
        <!-- INICIO BARRA LATERAL -->
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs my-0 fixed-start" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="menu_principal.php">
                    <!-- <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
                    <span class="ms-1 font-weight-bold" style="font-size: 16px;">Sistema Navidad Curicó</span>
                </a>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <!-- INICIO REGISTRAR -->
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Registrar</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrar_menores.php">
                            <span class="nav-link-text ms-1">Registrar menores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrar_delegados.php">
                            <span class="nav-link-text ms-1">Registrar delegados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrar_jdv.php">
                            <span class="nav-link-text ms-1">Registrar juntas de vecinos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrar_poblaciones.php">
                            <span class="nav-link-text ms-1">Registrar poblaciones</span>
                        </a>
                    </li>
                    <!-- FIN REGISTRAR -->

                    <!-- INICIO EDITAR -->
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Editar</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_menores.php">
                            <span class="nav-link-text ms-1">Editar menores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_delegados.php">
                            <span class="nav-link-text ms-1">Editar delegados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_jdv.php">
                            <span class="nav-link-text ms-1">Editar juntas de vecinos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_poblaciones.php">
                            <span class="nav-link-text ms-1">Editar poblaciones</span>
                        </a>
                    </li>
                    <!-- FIN EDITAR -->

                    <!-- INICIO ELIMINAR -->
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Eliminar</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eliminar_menores.php">
                            <span class="nav-link-text ms-1">Eliminar menores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eliminar_delegados.php">
                            <span class="nav-link-text ms-1">Eliminar delegados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eliminar_jdv.php">
                            <span class="nav-link-text ms-1">Eliminar juntas de vecinos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eliminar_poblaciones.php">
                            <span class="nav-link-text ms-1">Eliminar poblaciones</span>
                        </a>
                    </li>
                    <!-- FIN ELIMINAR -->

                    <!-- INICIO REPORTES -->
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Reportes</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generar_reporte_1.php">
                            <span class="nav-link-text ms-1">Generar reportes simplificados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generar_reporte_2.php">
                            <span class="nav-link-text ms-1">Generar reportes detallados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="descarga_documentacion.php">
                            <span class="nav-link-text ms-1">Descargar documentación adicional</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="estadisticas.php">
                            <span class="nav-link-text ms-1">Estadísticas Generales</span>
                        </a>
                    </li>
                    <!-- FIN REPORTES -->
                </ul>
            </div>
        </aside>
        <!-- FIN BARRA LATERAL -->
        
        <!-- INICIO MAIN -->
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- INICIO BARRA SUPERIOR -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-3 px-3">
                    <nav aria-label="breadcrumb">
                        <h3 class="font-weight-bolder mb-0">Menú Principal</h3>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                    <i class="bi bi-person-fill me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Usuario</span> <!-- REEMPLAZAR POR NOMBRE DE USUARIO LOGUEADO -->
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                    <i class="bi bi-gear-fill me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Ajustes</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- FIN BARRA SUPERIOR -->

            <!-- INICIO BLOQUE PRINCIPAL -->
            <div class="container-fluid py-0">

                <!-- INICIO MENORES -->
                <div class="row mt-0">
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_menor.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">REGISTRAR UN MENOR</h5>
                                    <p class="text-white">Registre un nuevo menor en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="registrar_menores.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/edi_menor.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">EDITAR DATOS DE UN MENOR</h5>
                                    <p class="text-white">Edite los datos de un menor registrado en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"  href="editar_menores.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/eli_menor.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">ELIMINAR UN MENOR</h5>
                                    <p class="text-white">Elimine un menor registrado en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="eliminar_menores.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN MENORES -->

                <!-- INICIO DELEGADOS -->
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_delegado.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">REGISTRAR UN DELEGADO</h5>
                                    <p class="text-white">Registre un nuevo delegado en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="registrar_delegados.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/edi_delegado.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">EDITAR DATOS DE UN DELEGADO</h5>
                                    <p class="text-white">Edite los datos de un delegado registrado en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="editar_delegados.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/eli_delegado.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">ELIMINAR UN DELEGADO</h5>
                                    <p class="text-white">Elimine un delegado registrado en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="eliminar_delegados.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN DELEGADOS -->

                <!-- INICIO JUNTAS DE VECINOS -->
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_jdv.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">REGISTRAR UNA JUNTA DE VECINOS</h5>
                                    <p class="text-white">Registre una nueva junta de vecinos en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="registrar_jdv.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/edi_jdv.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">EDITAR DATOS DE UNA JUNTA DE VECINOS</h5>
                                    <p class="text-white">Edite los datos de una junta de vecinos registrada en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="editar_jdv.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/eli_jdv.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">ELIMINAR UNA JUNTA DE VECINOS</h5>
                                    <p class="text-white">Elimine una junta de vecinos registrada en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="eliminar_jdv.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN JUNTAS DE VECINOS -->

                <!-- INICIO POBLACIONES -->
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_poblacion.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">REGISTRAR UNA POBLACIÓN</h5>
                                    <p class="text-white">Registre una nueva población en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="registrar_poblaciones.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/edi_poblacion.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">EDITAR DATOS DE UNA POBLACIÓN</h5>
                                    <p class="text-white">Edite los datos de una población registrada en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="editar_poblaciones.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/eli_poblacion.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">ELIMINAR UNA POBLACIÓN</h5>
                                    <p class="text-white">Elimine una población registrada en el sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="eliminar_poblaciones.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN POBLACIONES -->

                <!-- INICIO REPORTES -->
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_poblacion.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">GENERAR UN REPORTE SIMPLIFICADO</h5>
                                    <p class="text-white">Genere un reporte en PDF acerca de la cantidad de menores inscritos por junta de vecinos.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="generar_reporte_1.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_poblacion.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">GENERAR UN REPORTE DETALLADO</h5>
                                    <p class="text-white">Genere un reporte en PDF acerca de los menores inscritos por junta de vecinos.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="generar_reporte_2.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_poblacion.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">DESCARGAR DOCUMENTACIÓN ADICIONAL</h5>
                                    <p class="text-white">Descargue documentación adicional útil.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="descarga_documentacion.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN REPORTES -->

                <!-- INICIO ESTADISTICAS -->
                <div class="row mt-4">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('../assets/img/reg_poblacion.png');">
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">ESTADÍSTICAS GENERALES</h5>
                                    <p class="text-white">Revise estadísticas interesantes acerca del uso del sistema.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="estadisticas.php">
                                        IR AL TRÁMITE
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
                <!-- FIN ESTADISTICAS -->
            </div>
            <!-- FIN BLOQUE PRINCIPAL -->

            <!-- INICIO FOOTER -->
            <footer class="footer pt-5 pb-3">
              <div class="text-sm text-center">
                  Desarrollado por el Departamento de Informática de la Ilustre Municipalidad de Curicó
              </div>
          </footer>
          <!-- FIN FOOTER -->
        </main>
        <!-- FIN MAIN -->
    </body>
    <!-- FIN BODY -->
</html>