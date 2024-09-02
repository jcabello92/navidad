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
      }

      /* CIERRA EL MODAL SI SE HACE UN CLICK FUERA DE ESTE */
      window.onclick = function(event)
      {
          if(event.target == document.getElementById('modal_v1'))
          {
              document.getElementById('modal_v1').style.display = "none";
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
      $jdv = '';

      if(isset($_POST['rut'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['jdv']))
      {
        $rut = $_POST['rut'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $direccion = $_POST['direccion'];
        $jdv = $_POST['jdv'];

        $verificar = verificar_repetido($rut);

        // NO EXISTE EL DATO EN LA BASE DE DATOS
        if($verificar == 2)
        {
          // SE REGISTRO CORRECTAMENTE EL DATO EN LA BASE DE DATOS
          if(registrar_menor($rut, $nombre, $apellido, $sexo, $fecha_nacimiento, $direccion, $jdv))
          {
            $titulo_modal = "REGISTRO EXITOSO";
            $informacion_modal = $nombre . " " . $apellido . " se ha registrado correctamente en el sistema.";
            echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#00C94D'); </script>";
            limpiar_datos();
          }
          // HUBO UN ERROR EN EL REGISTRO EN LA BASE DE DATOS
          else
          {
            $titulo_modal = "ERROR";
            $informacion_modal = "Ha ocurrido un error registrando a " . $nombre . " " . $apellido . " en el sistema.";
            echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
          }
        }
        // EXISTE EL DATO EN LA BASE DE DATOS
        else if($verificar == 1)
        {
          $titulo_modal = "ERROR";
          $informacion_modal = $nombre . " " . $apellido . " ya se encuentra registrado en el sistema.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
        }
        // HUBO UN ERROR AL COMPROBAR LA BASE DE DATOS
        else
        {
          $titulo_modal = "ERROR";
          $informacion_modal = "Ha ocurrido un error al comprobar si " . $nombre . " " . $apellido . " estaba registrado en el sistema.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
        }
      }
      // FALTA SELECCIONAR EL SEXO Y LA JUNTA DE VECINOS DEL MENOR
      else if(isset($_POST['rut'], $_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['direccion']))
      {
        // FALTA SELECCIONAR EL SEXO DEL MENOR
        if(! isset($_POST['sexo']))
        {
          $titulo_modal = "ERROR";
          $informacion_modal = "No ha seleccionado el sexo del menor.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
        }
        // FALTA SELECCIONAR LA JUNTA DE VECINOS DEL MENOR
        else if(! isset($_POST['jdv']))
        {
          $titulo_modal = "ERROR";
          $informacion_modal = "No ha seleccionado la junta de vecinos a la cual pertenece el menor.";
          echo "<script> lanzar_modal_v1('" . $titulo_modal . "', '" . $informacion_modal . "', '#ff004c'); </script>";
        }
      }

      function verificar_repetido($rut)
      {
        $sql = "SELECT * FROM menores WHERE MEN_RUT = '" . $rut . "';";
        return comprobar_repetido($sql);
      }

      function registrar_menor($rut, $nombre, $apellido, $sexo, $fecha_nacimiento, $direccion, $jdv)
      {
        $sql = "INSERT INTO menores (MEN_RUT, MEN_NOMBRE, MEN_APELLIDO, SEX_ID, MEN_FECHA_NACIMIENTO, MEN_DIRECCION, JV_ID) VALUES('" . $rut . "', '" . $nombre . "', '" . $apellido . "', " . $sexo . ", '" . $fecha_nacimiento . "', '" . $direccion . "', " . $jdv . ");";
        return agregar($sql);
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
                        <a class="nav-link active" href="registrar_menores.php">
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
                        <h3 class="font-weight-bolder mb-0">Registrar Menores</h3>
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
                            <form role="form text-left" name="reg-menor" method="post" action="registrar_menores.php">
                                <label>RUT DEL MENOR</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="rut" name="rut" minlength="11" maxlength="13" required placeholder="Ingrese el RUT del menor" <?php if(isset($_POST['rut'])) echo "value='" . $_POST['rut'] . "'";?> onInput="validar_rut_aux(this, 'onInput', 'rut')" onblur="validar_rut_aux(this, 'onblur', 'rut')">
                                </div>
                                <label>NOMBRE DEL MENOR</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre" maxlength="60" required placeholder="Ingrese el nombre del menor" <?php if(isset($_POST['nombre'])) echo "value='" . $_POST['nombre'] . "'";?>>
                                </div>
                                <label>APELLIDO DEL MENOR</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="apellido" name="apellido" maxlength="60" required placeholder="Ingrese el apellido del menor" <?php if(isset($_POST['apellido'])) echo "value='" . $_POST['apellido'] . "'";?>>
                                </div>
                                <label>SEXO DEL MENOR</label>
                                <select class="mb-3 form-select" id="sexo" name="sexo" required>
                                    <option value="0" disabled <?php if(! isset($_POST['sexo'])) echo "selected";?>>Seleccione el sexo del menor...</option>
                                    <option value="1" <?php if(isset($_POST['sexo'])) if($_POST['sexo'] == 1) echo "selected";?>>MASCULINO</option>
                                    <option value="2" <?php if(isset($_POST['sexo'])) if($_POST['sexo'] == 2) echo "selected";?>>FEMENINO</option>
                                </select>
                                <label>FECHA DE NACIMIENTO DEL MENOR</label>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required <?php if(isset($_POST['fecha_nacimiento'])) echo "value='" . $_POST['fecha_nacimiento'] . "'";?>>
                                </div>
                                <label>DIRECCIÓN DEL MENOR</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="150" required placeholder="Ingrese la dirección del menor" <?php if(isset($_POST['direccion'])) echo "value='" . $_POST['direccion'] . "'";?>>
                                </div>
                                <label>JUNTA DE VECINOS A LA QUE PERTENECE EL MENOR</label>
                                <select class="mb-3 form-select" id="jdv" name="jdv" required>
                                    <option value="0" disabled <?php if(! isset($_POST['jdv'])) echo "selected";?>>Seleccione la junta de vecinos a la que pertenece el menor...</option>
                                    <?php
                                        $jdv = cargar_jdv();

                                        if($jdv != null)
                                        {
                                          for($i = 0; $i < count($jdv); $i++)
                                          {
                                            $option = "<option value='" . $jdv[$i][0] . "'";
                                            if(isset($_POST['jdv']))
                                            {
                                              if($_POST['jdv'] == $jdv[$i][0])
                                              {
                                                $option = $option . " selected";
                                              }
                                            }
                                            $option = $option . ">" . $jdv[$i][1] . "</option>";
                                            echo $option;
                                          }
                                        }
                                    ?>
                                </select>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" id="registrar">Registrar</button>
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