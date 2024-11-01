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
      <script src="../js/main.js"></script>
    </head>
    <!-- FIN HEAD -->

    <form name="edi-jdv" id="edi-jdv" method="post" action="editar_jdv_2.php">
      <input type="text" style="display: none;" name="id" id="id" value="">
    </form>

    <form name="filtrar" id="filtrar" method="post" action="editar_jdv.php">
      <input type="text" style="display: none;" name="tipo" id="tipo" value="">
      <input type="text" style="display: none;" name="dato" id="dato" value="">
    </form>

    <!-- INICIO JAVASCRIPT -->
    <script>
      function lanzar_editor(id)
      {
        document.getElementById('id').value = id;
        document.getElementById('edi-jdv').submit();
      }
    </script>
    <!-- FIN JAVASCRIPT -->

    <!-- INICIO PHP -->
    <?php
      include('../php/bd.php');

      $tipo = 'JV_NOMBRE';
      $dato = '';

      if(isset($_POST['tipo']))
      {
        $tipo = $_POST['tipo'];
      }

      if(isset($_POST['dato']))
      {
        $dato = $_POST['dato'];
      }

      function limpiar_datos()
      {
        $tipo = '';
        $dato = '';

        $_POST['dato'] = null;
      }
    ?>
    <!-- FIN PHP -->

    <!-- INICIO BODY -->
    <body class="g-sidenav-show bg-gray-100">
        <!-- INICIO BARRA LATERAL -->
        <aside class="sidenav navbar navbar-vertical navbar-expand-xs my-0 fixed-start" style="z-index: 0;" id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="../pages/menu_principal.php">
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
                        <a class="nav-link" href="../pages/registrar_menores.php">
                            <span class="nav-link-text ms-1">Registrar menores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/registrar_delegados.php">
                            <span class="nav-link-text ms-1">Registrar delegados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/registrar_jdv.php">
                            <span class="nav-link-text ms-1">Registrar juntas de vecinos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/registrar_poblaciones.php">
                            <span class="nav-link-text ms-1">Registrar poblaciones</span>
                        </a>
                    </li>
                    <!-- FIN REGISTRAR -->

                    <!-- INICIO EDITAR -->
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Editar</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/editar_menores.php">
                            <span class="nav-link-text ms-1">Editar menores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/editar_delegados.php">
                            <span class="nav-link-text ms-1">Editar delegados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../pages/editar_jdv.php">
                            <span class="nav-link-text ms-1">Editar juntas de vecinos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/editar_poblaciones.php">
                            <span class="nav-link-text ms-1">Editar poblaciones</span>
                        </a>
                    </li>
                    <!-- FIN EDITAR -->

                    <!-- INICIO ELIMINAR -->
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Eliminar</h6>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/eliminar_menores.php">
                            <span class="nav-link-text ms-1">Eliminar menores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/eliminar_delegados.php">
                            <span class="nav-link-text ms-1">Eliminar delegados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/eliminar_jdv.php">
                            <span class="nav-link-text ms-1">Eliminar juntas de vecinos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/eliminar_poblaciones.php">
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
                            <span class="nav-link-text ms-1">Descargar documentación</span>
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
                        <h3 class="font-weight-bolder mb-0">Editar Juntas de Vecinos</h3>
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
            <div class="container-fluid">
              <div class="col-xl-4 col-lg-5 col-md-7 mx-auto pt-3 pb-5">
                  <div class="input-group">
                      <select class="form-select" style="background-color: #ECEFF1" id="tipo_dato">
                          <option value="JV_NOMBRE" <?php if ($tipo == "JV_NOMBRE") echo "selected"; ?>>NOMBRE</option>
                          <option value="POB_NOMBRE" <?php if ($tipo == "POB_NOMBRE") echo "selected"; ?>>POBLACIÓN</option>
                          <option value="DELEGADO" <?php if ($tipo == "DELEGADO") echo "selected"; ?>>DELEGADO</option>
                      </select>
                      <input type="text" class="form-control" style="width: 40%;" id="buscar" <?php echo "value='" . $dato . "'"; ?>>
                  </div>
                  <div class="text-center">
                      <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2" id="boton_buscar" onclick="filtrar_datos()">Buscar</button>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                        <div class="container-fluid py-0 px-0">
                            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4">
                                <ul class="navbar-nav  justify-content-end">
                                    <li class="nav-item d-flex align-items-center">
                                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" onclick="recargar_pagina('editar_jdv.php')">
                                            <i class="bi bi-filter me-sm-1" <?php if($dato != '') echo 'style="color: #012E40;"'; else echo 'style="color: grey;" disabled'; ?>></i>
                                            <span class="d-sm-inline d-none" <?php if($dato != '') echo 'style="color: #012E40;"'; else echo 'style="color: grey;" disabled'; ?>>Quitar filtros</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </nav>
                      <div class="table-responsive">
                          <table class="table align-items-center mb-0">
                              <thead>
                                  <tr style="background-color: #253C59; color: white;">
                                      <th class="text-center text-uppercase text-xs font-weight-bolder col-3">NOMBRE</th>
                                      <th class="text-center text-uppercase text-xs font-weight-bolder col-3">POBLACIÓN</th>
                                      <th class="text-center text-uppercase text-xs font-weight-bolder col-3">DIRECCIÓN</th>
                                      <th class="text-center text-uppercase text-xs font-weight-bolder col-2">DELEGADO</th>
                                      <th class="col-1"></th>
                                  </tr>
                              </thead>
                              <tbody>





                                      <?php
                                          $jdv = mostrar_jdv($tipo, $dato);

                                          if($jdv != null)
                                          {
                                            for($i = 0; $i < count($jdv); $i++)
                                            {
                                              echo '<tr>';
                                              echo '<td class="text-center text-xs font-weight-bolder col-3">';
                                              echo '<p class="text-xs font-weight-bold mx-2 mb-0">' . $jdv[$i][1] . '</p>';
                                              echo '</td>';
                                              echo '<td class="text-center text-xs font-weight-bolder col-3">';
                                              echo '<p class="text-xs font-weight-bold mx-2 mb-0">' . $jdv[$i][2] . '</p>';
                                              echo '</td>';
                                              echo '<td class="text-center text-xs font-weight-bolder col-3">';
                                              echo '<p class="text-xs font-weight-bold mx-2 mb-0">' . $jdv[$i][3] . '</p>';
                                              echo '</td>';
                                              echo '<td class="text-center text-xs font-weight-bolder col-2">';
                                              echo '<p class="text-xs font-weight-bold mx-2 mb-0">' . $jdv[$i][5] . ' ' . $jdv[$i][6] . '</p>';
                                              echo '<p class="text-xs text-secondary mb-0">' . $jdv[$i][4] . '</p>';
                                              echo '</td>';
                                              echo '<td class="align-middle text-center">';
                                              echo '<a href="javascript:;" class="align-middle text-center text-sm">';
                                              echo '<button class="btn" style="background-color: #253C59; color: white;" type="button" onclick="lanzar_editor(' . "'" . $jdv[$i][0] . "'" . ')">Editar</button>'; // CONECTAR EDITOR PERSONALIZADO...
                                              echo '</a>';
                                              echo '</td>';
                                              echo "</tr>";
                                            }
                                          }
                                      ?>





                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
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