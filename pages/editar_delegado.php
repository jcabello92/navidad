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
          location.href = "editar_delegados.php";
      }

      /* CIERRA EL MODAL SI SE HACE UN CLICK FUERA DE ESTE */
      window.onclick = function(event)
      {
          if(event.target == document.getElementById('modal_v1'))
          {
              document.getElementById('modal_v1').style.display = "none";
              location.href = "editar_delegados.php";
          }
      }

      /* VALIDA QUE EL RUT INGRESADO SEA UN RUT REAL */
      function validar_rut_aux(rut, funcion, elemento)
      {
          ingresar_rut(elemento);

          if(rut.value != '' && ! validar_rut(rut.value))
          {
              if(funcion == 'onblur')
              {
                  lanzar_modal_v1('RUT INVÁLIDO', 'El RUT ingresado no es válido. Por favor ingrese un RUT válido.', '#ff004c');
              }
              rut.setAttribute("style", "outline: 0.3em solid #ff004c;");
              rut.focus();
          }
          else if(validar_rut(rut.value))
          {
              rut.setAttribute("style", "outline: none;");
          }
      }
    </script>
    <!-- FIN JAVASCRIPT -->

    <!-- INICIO PHP -->
    <?php
      include('../php/bd.php');

      $rut = '';
      $nombre = '';
      $apellido = '';
      $sexo = '';
      $fecha_nacimiento = '';
      $direccion = '';
      $telefono_1 = '';
      $telefono_2 = '';
      $correo = '';

      // SE ACTUALIZAN DATOS
      if(isset($_POST['rut'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['telefono_1'], $_POST['correo']))
      {
        $rut = $_POST['rut'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $direccion = $_POST['direccion'];
        $telefono_1 = $_POST['telefono_1'];
        if(isset($_POST['telefono_2']))
        {
          $telefono_2 = $_POST['telefono_2'];
        }
        $correo = $_POST['correo'];

        // SE REGISTRO CORRECTAMENTE EL DATO EN LA BASE DE DATOS
        if(actualizar_delegado($rut, $nombre, $apellido, $sexo, $fecha_nacimiento, $direccion, $telefono_1, $telefono_2, $correo))
        {
          $titulo_modal = "ACTUALIZACIÓN DE DATOS EXITOSA";
          $informacion_modal = "Los datos de " . $nombre . " " . $apellido . " se han actualizado correctamente en el sistema.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#00C94D'); </script>";
          limpiar_datos();
        }
        // HUBO UN ERROR EN EL REGISTRO EN LA BASE DE DATOS
        else
        {
          $titulo_modal = "ERROR";
          $informacion_modal = "Ha ocurrido un error actualizando los datos de " . $nombre . " " . $apellido . " en el sistema.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
        }
      }
      // SE CARGAN DATOS
      if(isset($_POST['rut']))
      {
        $delegado = mostrar_delegado($_POST['rut']);

        $rut = $delegado[0][0];
        $nombre = $delegado[0][1];
        $apellido = $delegado[0][2];
        $sexo = $delegado[0][3];
        $fecha_nacimiento = $delegado[0][4];
        $direccion = $delegado[0][5];
        $telefono_1 = $delegado[0][6];
        $telefono_2 = $delegado[0][7];
        $correo = $delegado[0][8];
      }

      function actualizar_delegado($rut, $nombre, $apellido, $sexo, $fecha_nacimiento, $direccion, $telefono_1, $telefono_2, $correo)
      {
        $sql = "UPDATE delegados SET DEL_NOMBRE = '" . $nombre . "', DEL_APELLIDO = '" . $apellido . "', SEX_ID = " . $sexo . ", DEL_FECHA_NACIMIENTO = '" . $fecha_nacimiento . "', DEL_DIRECCION = '" . $direccion . "', DEL_TELEFONO_1 = '" . $telefono_1 . "', DEL_TELEFONO_2 = '" . $telefono_2 . "', DEL_CORREO = '" . $correo . "' WHERE DEL_RUT = '" . $rut . "';";
        return actualizar($sql);
      }

      function limpiar_datos()
      {
        $rut = '';
        $nombre = '';
        $apellido = '';
        $sexo = '';
        $fecha_nacimiento = '';
        $direccion = '';
        $jdv = '';

        $_POST['rut'] = null;
        $_POST['nombre'] = null;
        $_POST['apellido'] = null;
        $_POST['sexo'] = null;
        $_POST['fecha_nacimiento'] = null;
        $_POST['direccion'] = null;
        $_POST['jdv'] = null;
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
                        <a class="nav-link active" href="../pages/editar_delegados.php">
                            <span class="nav-link-text ms-1">Editar delegados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/editar_jdv.php">
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
                        <h3 class="font-weight-bolder mb-0">Editar Delegado</h3>
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
                            <form role="form text-left" name="edi-delegado" method="post" action="editar_delegado.php">
                                <label>RUT DEL DELEGADO</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="rut_aux" name="rut_aux" minlength="11" maxlength="13" required <?php echo "value='" . $rut . "'";?> disabled>
                                    <input type="text" class="form-control" style="display: none;" id="rut" name="rut" minlength="11" maxlength="13" required <?php echo "value='" . $rut . "'";?>>
                                </div>
                                <label>NOMBRE DEL DELEGADO</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre" maxlength="60" required placeholder="Ingrese el nombre del delegado" <?php echo "value='" . $nombre . "'";?>>
                                </div>
                                <label>APELLIDO DEL DELEGADO</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="apellido" name="apellido" maxlength="60" required placeholder="Ingrese el apellido del delegado" <?php echo "value='" . $apellido . "'";?>>
                                </div>
                                <label>SEXO DEL DELEGADO</label>
                                <select class="mb-3 form-select" id="sexo" name="sexo" required>
                                    <option value="1" <?php if($sexo == '1') echo "selected";?>>MASCULINO</option>
                                    <option value="2" <?php if($sexo == '2') echo "selected";?>>FEMENINO</option>
                                </select>
                                <label>FECHA DE NACIMIENTO DEL DELEGADO</label>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required <?php echo "value='" . $fecha_nacimiento . "'";?>>
                                </div>
                                <label>DIRECCIÓN DEL DELEGADO</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="150" required placeholder="Ingrese la dirección del delegado" <?php echo "value='" . $direccion . "'";?>>
                                </div>
                                <label>TELÉFONO PRINCIPAL</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text" id="basic-addon1">+56 9</span>
                                    <input type="text" class="form-control" id="telefono_1" name="telefono_1" maxlength="8" required placeholder="Ingrese el teléfono principal del delegado" <?php echo "value='" . $telefono_1 . "'";?>>
                                </div>
                                <label>TELÉFONO SECUNDARIO</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">+56 9</span>
                                    <input type="text" class="form-control" id="telefono_2" name="telefono_2" maxlength="8" placeholder="Ingrese el teléfono secundario del delegado" <?php echo "value='" . $telefono_2 . "'";?>>
                                </div>
                                <label>CORREO ELECTRÓNICO</label>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="correo" name="correo" maxlength="60" required placeholder="Ingrese el correo electrónico del delegado" <?php echo "value='" . $correo . "'";?>>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-40 my-4 mb-2" style="margin-right: 2%;" id="actualizar">Actualizar</button>
                                    <button type="button" class="btn bg-gradient-dark w-40 my-4 mb-2" style="margin-left: 2%;" id="cancelar" onclick="location.href='editar_delegados.php'">Cancelar</button>
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