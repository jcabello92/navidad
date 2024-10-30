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

    <!-- INICIO MODAL -->
    <div class="modal-general" id="modal_v1">
        <div class="modal-principal">
            <h2 class="subtitulo" style="margin-top: 0px;" id="modal_v1_titulo"></h2>
            <p class="parrafo" style="text-align: center;" id="modal_v1_informacion"></p>
            <div class="text-center">
                <button class="btn btn-secondary btn-lg btn-block boton-modal" id="modal_v1_boton">CERRAR</button>
            </div>
        </div>
    </div>
    <!-- FIN MODAL -->

    <!-- INICIO JAVASCRIPT -->
    <script>
      function lanzar_modal_v1(modal_titulo, modal_informacion, color)
      {
          document.getElementById('modal_v1_titulo').innerHTML = modal_titulo;
          document.getElementById('modal_v1_informacion').innerHTML = modal_informacion;
          document.getElementById('modal_v1_titulo').style.color = color;
          document.getElementById('modal_v1').style.display = "block";
      }

      /* CIERRA EL MODAL SI SE HACE UN CLICK EN EL BOTÓN ACEPTAR */
      document.getElementById('modal_v1_boton').onclick = function ()
      {
          document.getElementById('modal_v1').style.display = "none";
          location.href = "editar_jdv.php";
      }

      /* CIERRA EL MODAL SI SE HACE UN CLICK FUERA DE ESTE */
      window.onclick = function(event)
      {
          if(event.target == document.getElementById('modal_v1'))
          {
              document.getElementById('modal_v1').style.display = "none";
              location.href = "editar_jdv.php";
          }
      }
    </script>
    <!-- FIN JAVASCRIPT -->

    <!-- INICIO PHP -->
    <?php
      include('../php/bd.php');

      $id = '';
      $jdv = '';
      $poblacion = '';
      $direccion = '';
      $delegado = '';

      // SE ACTUALIZAN DATOS
      if(isset($_POST['id'], $_POST['jdv'], $_POST['poblacion'], $_POST['delegado']))
      {
        $id = $_POST['id'];
        $jdv = $_POST['jdv'];
        $poblacion = $_POST['poblacion'];
        if(isset($_POST['direccion']))
        {
          $direccion = $_POST['direccion'];
        }
        $delegado = $_POST['delegado'];

        $verificar = verificar_repetido($jdv, $id);

        // NO EXISTE EL DATO EN LA BASE DE DATOS
        if($verificar == 2)
        {
          // SE REGISTRO CORRECTAMENTE EL DATO EN LA BASE DE DATOS
          if(actualizar_jdv($id, $jdv, $poblacion, $direccion, $delegado))
          {
            $titulo_modal = "ACTUALIZACIÓN DE DATOS EXITOSA";
            $informacion_modal = $jdv . " se ha actualizado correctamente en el sistema.";
            echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#00C94D'); </script>";
            limpiar_datos();
          }
          // HUBO UN ERROR EN EL REGISTRO EN LA BASE DE DATOS
          else
          {
            $titulo_modal = "ERROR";
            $informacion_modal = "Ha ocurrido un error actualizando " . $jdv . " en el sistema.";
            echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
          }
        }
        // EXISTE EL DATO EN LA BASE DE DATOS
        else if($verificar == 1)
        {
          $titulo_modal = "ERROR";
          $informacion_modal = $jdv . " ya se encuentra registrada en el sistema.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
        }
        // HUBO UN ERROR AL COMPROBAR LA BASE DE DATOS
        else
        {
          $titulo_modal = "ERROR";
          $informacion_modal = "Ha ocurrido un error al comprobar si " . $jdv . " estaba registrada en el sistema.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
        }
      }
      // SE CARGAN DATOS
      if(isset($_POST['id']))
      {
        $junta_vecinal = mostrar_jdv_2($_POST['id']);

        $id = $junta_vecinal[0][0];
        $jdv = $junta_vecinal[0][1];
        $poblacion = $junta_vecinal[0][2];
        $direccion = $junta_vecinal[0][3];
        $delegado = $junta_vecinal[0][4];
      }

      function verificar_repetido($jdv, $id)
      {
        $sql = "SELECT * FROM juntas_vecinales WHERE JV_NOMBRE = '" . $jdv . "' AND JV_ID != " . $id . ";";
        return comprobar_repetido($sql);
      }

      function actualizar_jdv($id, $jdv, $poblacion, $direccion, $delegado)
      {
        $sql = "UPDATE juntas_vecinales SET JV_NOMBRE = '" . $jdv . "', POB_ID = " . $poblacion . ", JV_DIRECCION = '" . $direccion . "', DEL_RUT = '" . $delegado . "' WHERE JV_ID = " . $id . ";";
        return actualizar($sql);
      }

      function limpiar_datos()
      {
        $id = '';
        $jdv = '';
        $poblacion = '';
        $direccion = '';
        $delegado = '';

        $_POST['id'] = null;
        $_POST['jdv'] = null;
        $_POST['poblacion'] = null;
        $_POST['direccion'] = null;
        $_POST['delegado'] = null;
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
                        <h3 class="font-weight-bolder mb-0">Editar Junta de Vecinos</h3>
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
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-body">
                            <form role="form text-left" name="edi-jdv" method="post" action="editar_jdv_2.php">
                                <input type="text" class="form-control" style="display: none;" id="id" name="id" required <?php echo "value='" . $id . "'";?>>
                                <label>NOMBRE DE LA JUNTA DE VECINOS</label>
                                <div class="mb-3">
                                  <input type="text" class="form-control" id="jdv" name="jdv" maxlength="60" required placeholder="Ingrese el nombre de la junta de vecinos" <?php echo "value='" . $jdv . "'";?>>
                                </div>
                                <label>POBLACIÓN A LA QUE PERTENECE LA JUNTA DE VECINOS</label>
                                <select class="mb-3 form-select" id="poblacion" name="poblacion" required>
                                    <?php
                                        $poblaciones = cargar_poblaciones();

                                        if($poblaciones != null)
                                        {
                                          for($i = 0; $i < count($poblaciones); $i++)
                                          {
                                            $option = "<option value='" . $poblaciones[$i][0] . "'";
                                            if($poblacion)
                                            {
                                              if($poblacion == $poblaciones[$i][0])
                                              {
                                                $option = $option . " selected";
                                              }
                                            }
                                            $option = $option . ">" . $poblaciones[$i][1] . "</option>";
                                            echo $option;
                                          }
                                        }
                                    ?>
                                </select>
                                <label>DIRECCIÓN DE LA SEDE DE LA JUNTA DE VECINOS</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="150" placeholder="Ingrese la dirección de la sede de la junta de vecinos" <?php echo "value='" . $direccion . "'";?>>
                                </div>
                                <label>DELEGADO DE LA JUNTA DE VECINOS</label>
                                <select class="mb-3 form-select" id="delegado" name="delegado" required>
                                    <?php
                                        $delegados = cargar_delegados();

                                        if($delegados != null)
                                        {
                                          for($i = 0; $i < count($delegados); $i++)
                                          {
                                            $option = "<option value='" . $delegados[$i][0] . "'";
                                            if(isset($delegado))
                                            {
                                              if($delegado == $delegados[$i][0])
                                              {
                                                $option = $option . " selected";
                                              }
                                            }
                                            $option = $option . ">" . $delegados[$i][1] . " " . $delegados[$i][2] . " | " . $delegados[$i][0] . "</option>";
                                            echo $option;
                                          }
                                        }
                                    ?>
                                </select>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-40 my-4 mb-2" style="margin-right: 2%;" id="actualizar">Actualizar</button>
                                    <button type="button" class="btn bg-gradient-dark w-40 my-4 mb-2" style="margin-left: 2%;" id="cancelar" onclick="location.href='editar_jdv.php'">Cancelar</button>
                              </div>
                            </form>
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