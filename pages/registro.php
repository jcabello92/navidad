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
        $_SESSION['usuario'] = '';
        $_SESSION['contrasena'] = '';
    ?>
    <!-- FIN VARIABLES DE SESIÓN -->

    <body class="">
        <main class="main-content  mt-0">
            <section class="min-vh-100 mb-0">
                <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/bg2.jpg');">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 text-center mx-auto">
                                <h1 class="text-white mb-2 mt-5">Bienvenido</h1>
                                <p class="text-lead text-white">Ingresa tus datos en el siguiente formulario para registrarte en el sistema.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                            <div class="card z-index-0">
                                <div class="card-body">
                                    <form role="form text-left">
                                        <label>Nombre</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
                                        </div>
                                        <label>Apellido</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="apellido" placeholder="Ingrese su apellido">
                                        </div>
                                        <label>Correo Electrónico</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="correo" placeholder="Ingrese su correo electrónico">
                                        </div>
                                        <label>Usuario</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="usuario" placeholder="Ingrese el nombre de usuario">
                                        </div>
                                        <label>Contraseña</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="contrasena_1" placeholder="Ingrese la contraseña">
                                        </div>
                                        <label>Repita la contraseña</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" id="contrasena_2" placeholder="Ingrese la contraseña nuevamente">
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2" id="registrarse">Registrarse</button>
                                        </div>
                                        <p class="text-sm mt-3 mb-0">¿Ya tiene una cuenta? <a href="inicio.php" class="text-dark font-weight-bolder">Inicie sesión</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
        <!-- INICIO FOOTER -->
        <footer class="footer pt-5 pb-3">
            <div class="text-sm text-center">
                Desarrollado por el Departamento de Informática de la Ilustre Municipalidad de Curicó
            </div>
        </footer>
        <!-- FIN FOOTER -->
    </body>
</html>