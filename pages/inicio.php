<!DOCTYPE html>
<html lang="en">
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

      function iniciar_sesion($usuario, $contrasena)
      {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contrasena'] = $contrasena;
        $_SESSION['pag_anterior'] = 'inicio.php';
      }
    ?>
    <!-- FIN VARIABLES DE SESIÓN -->

    <body class="">
        <main class="main-content mt-0">
            <section>
                <div class="page-header min-vh-75">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                                <div class="card card-plain mt-8">
                                    <div class="card-header pb-0 text-left bg-transparent">
                                        <h3 class="font-weight-bolder text-info text-gradient">Sistema Navidad Curicó</h3>
                                        <p class="mb-0">Ingrese su usuario y contraseña para iniciar sesión</p>
                                    </div>
                                    <div class="card-body">
                                        <form role="form">
                                            <label>Usuario</label>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="usuario" placeholder="Ingrese su usuario">
                                            </div>
                                            <label>Contraseña</label>
                                            <div class="mb-3">
                                                <input type="password" class="form-control" id="contrasena" placeholder="Ingrese su contraseña">
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="recuerdame">
                                                <label class="form-check-label" for="recuerdame">Recuérdame</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="button" class="btn bg-gradient-info w-100 mt-4 mb-0" id="iniciar_sesion" onclick="location.href='menu_principal.php'">Iniciar Sesión</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-4 text-sm mx-auto">
                                            ¿No tiene una cuenta?
                                            <a href="registro.php" class="text-info text-gradient font-weight-bold">Regístrese</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/bg2.jpg')"></div>
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