
<?php

/* VARIABLES */

/* SERVIDOR DE PRUEBAS */

$GLOBALS['servidor'] = 'localhost';
$GLOBALS['usuario_servidor'] = 'root';
$GLOBALS['contrasena_servidor'] = '';
$GLOBALS['bd'] = 'navidad';

/* SERVIDOR OFICIAL */

/*
$GLOBALS['servidor'] = 'localhost';
$GLOBALS['usuario_servidor'] = 'admin_denuncia';
$GLOBALS['contrasena_servidor'] = '#D3nunc14$++';
$GLOBALS['bd'] = 'admin_maltratoanimal';
*/

$GLOBALS['mysqli'] = new mysqli();










/* FUNCIONES */

/*FUNCIONES PRINCIPALES*/

/* ABRIR CONEXIÓN */

function abrir_conexion()
{
    try
    {
        $GLOBALS['mysqli']->connect($GLOBALS['servidor'], $GLOBALS['usuario_servidor'], $GLOBALS['contrasena_servidor'], $GLOBALS['bd']);
        return true;
    }
    catch(Exception $e)
    {
        return false;
    }
}










/* CERRAR CONEXIÓN */

function cerrar_conexion()
{
    try
    {
        $GLOBALS['mysqli']->close();
        return true;
    }
    catch(Exception $e)
    {
        return false;
    }
}










/* AGREGAR UN ELEMENTO A LA BASE DE DATOS */

function agregar($sql)
{
    abrir_conexion();

    try
    {
        $GLOBALS['mysqli']->query($sql);
        cerrar_conexion();
        return true;
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return false;
    }
}










/* ACTUALIZAR UN ELEMENTO DE LA BASE DE DATOS */

function actualizar($sql)
{
    abrir_conexion();

    try
    {
        $GLOBALS['mysqli']->query($sql);
        cerrar_conexion();
        return true;
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return false;
    }
}










/* ELIMINAR UN ELEMENTO DE LA BASE DE DATOS */

function eliminar($sql)
{
    abrir_conexion();

    try
    {
        $GLOBALS['mysqli']->query($sql);
        cerrar_conexion();
        return true;
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return false;
    }
}










/* COMPROBAR REPETIDOS */

function comprobar_repetido($sql)
{
    abrir_conexion();

    try
    {
        $resultado = $GLOBALS['mysqli']->query($sql);
        $lista = $resultado->fetch_assoc();
        $resultado->free();
        cerrar_conexion();
        if($lista != null)
        {
            return 1;
        }
        else
        {
            return 2;
        }
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return 0;
    }
}










/* CARGAR COMBOBOX */

/* CARGAR JUNTAS DE VECINOS */

function cargar_jdv()
{
    abrir_conexion();

    try
    {
        $sql = "SELECT * FROM juntas_vecinales ORDER BY JV_NOMBRE ASC;";

        $listaF = [];

        foreach($GLOBALS['mysqli']->query($sql) as $jdv)
        {
            $listaC = [];

            array_push($listaC, $jdv['JV_ID']);
            array_push($listaC, $jdv['JV_NOMBRE']);

            array_push($listaF, $listaC);
        }

        cerrar_conexion();

        if($listaF != null)
        {
            return $listaF;
        }
        else
        {
            return null;
        }
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return null;
    }
}










/* CARGAR POBLACIONES */

function cargar_poblaciones()
{
    abrir_conexion();

    try
    {
        $sql = "SELECT * FROM poblaciones ORDER BY POB_NOMBRE ASC;";

        $listaF = [];

        foreach($GLOBALS['mysqli']->query($sql) as $poblacion)
        {
            $listaC = [];

            array_push($listaC, $poblacion['POB_ID']);
            array_push($listaC, $poblacion['POB_NOMBRE']);

            array_push($listaF, $listaC);
        }

        cerrar_conexion();

        if($listaF != null)
        {
            return $listaF;
        }
        else
        {
            return null;
        }
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return null;
    }
}










/* CARGAR DELEGADOS */

function cargar_delegados()
{
    abrir_conexion();

    try
    {
        $sql = "SELECT DEL_RUT, DEL_NOMBRE, DEL_APELLIDO FROM delegados ORDER BY DEL_NOMBRE ASC, DEL_APELLIDO ASC, DEL_RUT ASC;";
        
        $listaF = [];

        foreach($GLOBALS['mysqli']->query($sql) as $delegado)
        {
            $listaC = [];

            array_push($listaC, $delegado['DEL_RUT']);
            array_push($listaC, $delegado['DEL_NOMBRE']);
            array_push($listaC, $delegado['DEL_APELLIDO']);

            array_push($listaF, $listaC);
        }

        cerrar_conexion();

        if($listaF != null)
        {
            return $listaF;
        }
        else
        {
            return null;
        }
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return null;
    }
}










/* MOSTRAR MENORES */

function mostrar_menores($tipo, $dato)
{
  abrir_conexion();

  try
  {
    if($tipo != '' && $dato != '')
    {
      $sql = "SELECT * FROM menores, sexos, juntas_vecinales WHERE menores.SEX_ID = sexos.SEX_ID AND menores.JV_ID = juntas_vecinales.JV_ID AND " . $tipo . " LIKE '%" . $dato . "%';";
    }
    else if($tipo == '' || $dato == '')
    {
      $sql = "SELECT * FROM menores, sexos, juntas_vecinales WHERE menores.SEX_ID = sexos.SEX_ID AND menores.JV_ID = juntas_vecinales.JV_ID;";
    }

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $menor)
    {
      $listaC = [];

      array_push($listaC, $menor['MEN_RUT']);
      array_push($listaC, $menor['MEN_NOMBRE']);
      array_push($listaC, $menor['MEN_APELLIDO']);
      array_push($listaC, $menor['SEX_NOMBRE']);
      array_push($listaC, $menor['MEN_FECHA_NACIMIENTO']);
      array_push($listaC, $menor['MEN_DIRECCION']);
      array_push($listaC, $menor['JV_NOMBRE']);

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}










/* MOSTRAR MENOR */

function mostrar_menor($rut)
{
  abrir_conexion();

  try
  {
    $sql = "SELECT * FROM menores WHERE MEN_RUT = '" . $rut . "';";
    
    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $menor)
    {
      $listaC = [];

      array_push($listaC, $menor['MEN_RUT']);
      array_push($listaC, $menor['MEN_NOMBRE']);
      array_push($listaC, $menor['MEN_APELLIDO']);
      array_push($listaC, $menor['SEX_ID']);
      array_push($listaC, $menor['MEN_FECHA_NACIMIENTO']);
      array_push($listaC, $menor['MEN_DIRECCION']);
      array_push($listaC, $menor['JV_ID']);

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}










/* MOSTRAR DELEGADOS */

function mostrar_delegados($tipo, $dato)
{
  abrir_conexion();

  try
  {
    $sql_jdv = "SELECT JV_NOMBRE, DEL_RUT FROM juntas_vecinales;";

    $juntas_vecinales = [];

    foreach($GLOBALS['mysqli']->query($sql_jdv) as $jdv)
    {
      $junta_vecinal = [];

      array_push($junta_vecinal, $jdv['JV_NOMBRE']);
      array_push($junta_vecinal, $jdv['DEL_RUT']);

      array_push($juntas_vecinales, $junta_vecinal);
    }

    if($tipo != '' && $dato != '')
    {
      $sql = "SELECT * FROM delegados, sexos WHERE delegados.SEX_ID = sexos.SEX_ID AND " . $tipo . " LIKE '%" . $dato . "%';";
    }
    else if($tipo == '' || $dato == '')
    {
      $sql = "SELECT * FROM delegados, sexos WHERE delegados.SEX_ID = sexos.SEX_ID;";
    }

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $delegado)
    {
      $listaC = [];

      array_push($listaC, $delegado['DEL_RUT']);
      array_push($listaC, $delegado['DEL_NOMBRE']);
      array_push($listaC, $delegado['DEL_APELLIDO']);
      array_push($listaC, $delegado['SEX_NOMBRE']);
      array_push($listaC, $delegado['DEL_FECHA_NACIMIENTO']);
      array_push($listaC, $delegado['DEL_DIRECCION']);
      for($i = 0; $i < count($juntas_vecinales); $i++)
      {
        if($juntas_vecinales[$i][1] == '')
        {
          array_push($listaC, '');
        }
        else
        {
          array_push($listaC, $juntas_vecinales[$i][0]);
        }
      }

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}










/* MOSTRAR DELEGADO */

function mostrar_delegado($rut)
{
  abrir_conexion();

  try
  {
    $sql = "SELECT * FROM delegados WHERE DEL_RUT = '" . $rut . "';";

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $delegado)
    {
      $listaC = [];

      array_push($listaC, $delegado['DEL_RUT']);
      array_push($listaC, $delegado['DEL_NOMBRE']);
      array_push($listaC, $delegado['DEL_APELLIDO']);
      array_push($listaC, $delegado['SEX_ID']);
      array_push($listaC, $delegado['DEL_FECHA_NACIMIENTO']);
      array_push($listaC, $delegado['DEL_DIRECCION']);
      array_push($listaC, $delegado['DEL_TELEFONO_1']);
      array_push($listaC, $delegado['DEL_TELEFONO_2']);
      array_push($listaC, $delegado['DEL_CORREO']);

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}










/* MOSTRAR JUNTAS DE VECINOS */

function mostrar_jdv($tipo, $dato)
{
  abrir_conexion();

  try
  {
    if($tipo != '' && $dato != '')
    {

      $sql = "SELECT * FROM juntas_vecinales, poblaciones, delegados WHERE juntas_vecinales.POB_ID = poblaciones.POB_ID AND juntas_vecinales.DEL_RUT = delegados.DEL_RUT AND " . $tipo . " LIKE '%" . $dato . "%';";
    }
    else if($tipo == '' || $dato == '')
    {
      $sql = "SELECT * FROM juntas_vecinales, poblaciones, delegados WHERE juntas_vecinales.POB_ID = poblaciones.POB_ID AND juntas_vecinales.DEL_RUT = delegados.DEL_RUT;";
    }

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $jdv)
    {
      $listaC = [];

      array_push($listaC, $jdv['JV_ID']);
      array_push($listaC, $jdv['JV_NOMBRE']);
      array_push($listaC, $jdv['POB_NOMBRE']);
      array_push($listaC, $jdv['JV_DIRECCION']);
      array_push($listaC, $jdv['DEL_RUT']);
      array_push($listaC, $jdv['DEL_NOMBRE']);
      array_push($listaC, $jdv['DEL_APELLIDO']);

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}










/* MOSTRAR JUNTA DE VECINOS */

function mostrar_jdv_2($id)
{
  abrir_conexion();

  try
  {
    $sql = "SELECT * FROM juntas_vecinales WHERE JV_ID = '" . $id . "';";
    
    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $jdv)
    {
      $listaC = [];

      array_push($listaC, $jdv['JV_ID']);
      array_push($listaC, $jdv['JV_NOMBRE']);
      array_push($listaC, $jdv['POB_ID']);
      array_push($listaC, $jdv['JV_DIRECCION']);
      array_push($listaC, $jdv['DEL_RUT']);

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}










/* MOSTRAR POBLACIONES */

function mostrar_poblaciones($tipo, $dato)
{
  abrir_conexion();

  try
  {
    if($tipo != '' && $dato != '')
    {
      $sql = "SELECT * FROM poblaciones WHERE " . $tipo . " LIKE '%" . $dato . "%';";
    }
    else if($tipo == '' || $dato == '')
    {
      $sql = "SELECT * FROM poblaciones;";
    }

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $poblacion)
    {
      $listaC = [];

      array_push($listaC, $poblacion['POB_ID']);
      array_push($listaC, $poblacion['POB_NOMBRE']);

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}










/* MOSTRAR POBLACIÓN */

function mostrar_poblacion($id)
{
  abrir_conexion();

  try
  {
    $sql = "SELECT * FROM poblaciones WHERE POB_ID = '" . $id . "';";

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $poblacion)
    {
      $listaC = [];

      array_push($listaC, $poblacion['POB_ID']);
      array_push($listaC, $poblacion['POB_NOMBRE']);

      array_push($listaF, $listaC);
    }

    cerrar_conexion();

    if($listaF != null)
    {
      return $listaF;
    }
    else
    {
      return null;
    }
  }
  catch(Exception $e)
  {
    cerrar_conexion();
    return null;
  }
}























function obtener_estadodenuncia($sql)
{
    abrir_conexion();

    try
    {
        $resultado = $GLOBALS['mysqli']->query($sql);
        $lista = $resultado->fetch_assoc();
        $resultado->free();
        cerrar_conexion();
        if($lista != null)
        {
            if($lista['EST_NOMBRE'] == "NUEVA")
            {
                return 1;
            }
            else if($lista['EST_NOMBRE'] == "EN PROCESO")
            {
                return 2;
            }
            else if($lista['EST_NOMBRE'] == "FINALIZADA")
            {
                return 3;
            }
        }
        else
        {
            return 4;
        }
    }
    catch(Exception $e)
    {
        cerrar_conexion();
        return 0;
    }
}

function obtener_registros($rut_login)
{
    abrir_conexion();

    $sql = "SELECT * FROM denunciados, denunciantes, denuncias, denunciantes_denuncias, estados, lugares WHERE denuncias.DENIAS_ID = denunciados.DENIAS_ID && denuncias.DENIAS_ID = denunciantes_denuncias.DENIAS_ID && denunciantes.DENTES_RUT = denunciantes_denuncias.DENTES_RUT && denuncias.LUG_ID = lugares.LUG_ID && denuncias.EST_ID = estados.EST_ID && (denuncias.INS_RUT = '" . $rut_login . "' || denuncias.INS_RUT = '') ORDER BY FIELD(denuncias.EST_ID, 2, 1, 3), denuncias.DENIAS_FECHADENUNCIA ASC, denuncias.DENIAS_HORADENUNCIA ASC";

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $fila)
    {
        $listaC = [];

        $nombre_denunciante = $fila['DENTES_NOMBRE'] . " " . $fila['DENTES_APELLIDO'];
        $nombre_denunciado = $fila['DENDOS_NOMBRE'] . " " . $fila['DENDOS_APELLIDO'];

        $denias_id = $fila['DENIAS_ID'];
        $contador = 0;
        while(intdiv($denias_id, 10) > 0)
        {
            $contador = $contador + 1;
            $denias_id = intdiv($denias_id, 10);
        }
        $seguimiento = "DMA";
        switch($contador)
        {
            case 0:
                $seguimiento = $seguimiento . "0000000" . $fila['DENIAS_ID'];
                break;
            case 1:
                $seguimiento = $seguimiento . "000000" . $fila['DENIAS_ID'];
                break;
            case 2:
                $seguimiento = $seguimiento . "00000" . $fila['DENIAS_ID'];
                break;
            case 3:
                $seguimiento = $seguimiento . "0000" . $fila['DENIAS_ID'];
                break;
            case 4:
                $seguimiento = $seguimiento . "000" . $fila['DENIAS_ID'];
                break;
            case 5:
                $seguimiento = $seguimiento . "00" . $fila['DENIAS_ID'];
                break;
            case 6:
                $seguimiento = $seguimiento . "0" . $fila['DENIAS_ID'];
                break;
            case 7:
                $seguimiento = $seguimiento . $fila['DENIAS_ID'];
                break;
        }

        array_push($listaC, $seguimiento);                      // 0
        array_push($listaC, $fila['DENIAS_DETALLEMALTRATO']);   // 1
        array_push($listaC, $fila['DENIAS_TESTIGO']);           // 2
        array_push($listaC, $fila['DENIAS_FECHADENUNCIA']);     // 3
        array_push($listaC, $fila['DENIAS_HORADENUNCIA']);      // 4
        array_push($listaC, $fila['DENIAS_FECHAMALTRATO']);     // 5
        array_push($listaC, $fila['DENIAS_HORAMALTRATO']);      // 6
        array_push($listaC, $fila['LUG_NOMBRE']);               // 7
        array_push($listaC, $fila['DENIAS_DETALLELUGAR']);      // 8
        array_push($listaC, $fila['EST_NOMBRE']);               // 9
        array_push($listaC, $fila['INS_RUT']);                  // 10
        array_push($listaC, $fila['DENTES_RUT']);               // 11
        array_push($listaC, $nombre_denunciante);               // 12
        array_push($listaC, $fila['DENTES_BANEADO']);           // 13

        if($fila['INS_RUT'] != "")
        {
            $sql_inspector = "SELECT * FROM inspectores WHERE inspectores.INS_RUT = '" . $fila['INS_RUT'] . "'";

            foreach($GLOBALS['mysqli']->query($sql_inspector) as $fila_inspector)
            {
                $nombre_inspector = $fila_inspector['INS_NOMBRE'] . " " . $fila_inspector['INS_APELLIDO'];

                array_push($listaC, $nombre_inspector);                             // 14
            }
        }
        else
        {
            array_push($listaC, "");                                                // 14
        }

        array_push($listaF, $listaC);
    }

    cerrar_conexion();

    return $listaF;
}

function obtener_registro($codigo)
{
    abrir_conexion();

    $sql = "SELECT * FROM denunciados, denunciantes, denuncias, denunciantes_denuncias, estados, lugares WHERE denuncias.DENIAS_ID = " . $codigo . " && denuncias.DENIAS_ID = denunciados.DENIAS_ID && denuncias.DENIAS_ID = denunciantes_denuncias.DENIAS_ID && denunciantes.DENTES_RUT = denunciantes_denuncias.DENTES_RUT && denuncias.LUG_ID = lugares.LUG_ID && denuncias.EST_ID = estados.EST_ID";

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $fila)
    {
        $listaC = [];

        $nombre_denunciante = $fila['DENTES_NOMBRE'] . " " . $fila['DENTES_APELLIDO'];
        $nombre_denunciado = $fila['DENDOS_NOMBRE'] . " " . $fila['DENDOS_APELLIDO'];

        $denias_id = $fila['DENIAS_ID'];
        $contador = 0;
        while(intdiv($denias_id, 10) > 0)
        {
            $contador = $contador + 1;
            $denias_id = intdiv($denias_id, 10);
        }
        $seguimiento = "DMA";
        switch($contador)
        {
            case 0:
                $seguimiento = $seguimiento . "0000000" . $fila['DENIAS_ID'];
                break;
            case 1:
                $seguimiento = $seguimiento . "000000" . $fila['DENIAS_ID'];
                break;
            case 2:
                $seguimiento = $seguimiento . "00000" . $fila['DENIAS_ID'];
                break;
            case 3:
                $seguimiento = $seguimiento . "0000" . $fila['DENIAS_ID'];
                break;
            case 4:
                $seguimiento = $seguimiento . "000" . $fila['DENIAS_ID'];
                break;
            case 5:
                $seguimiento = $seguimiento . "00" . $fila['DENIAS_ID'];
                break;
            case 6:
                $seguimiento = $seguimiento . "0" . $fila['DENIAS_ID'];
                break;
            case 7:
                $seguimiento = $seguimiento . $fila['DENIAS_ID'];
                break;
        }

        array_push($listaC, $seguimiento);                      // 0
        array_push($listaC, $fila['DENIAS_DETALLEMALTRATO']);   // 1
        array_push($listaC, $fila['DENIAS_TESTIGO']);           // 2
        array_push($listaC, $fila['DENIAS_FECHADENUNCIA']);     // 3
        array_push($listaC, $fila['DENIAS_HORADENUNCIA']);      // 4
        array_push($listaC, $fila['DENIAS_FECHAMALTRATO']);     // 5
        array_push($listaC, $fila['DENIAS_HORAMALTRATO']);      // 6
        array_push($listaC, $fila['LUG_NOMBRE']);               // 7
        array_push($listaC, $fila['DENIAS_DETALLELUGAR']);      // 8
        array_push($listaC, $fila['EST_NOMBRE']);               // 9
        array_push($listaC, $fila['DENTES_RUT']);               // 10
        array_push($listaC, $nombre_denunciante);               // 11
        array_push($listaC, $fila['DENTES_TELEFONO']);          // 12
        array_push($listaC, $fila['DENTES_CORREO']);            // 13
        array_push($listaC, $fila['DENTES_DIRECCION']);         // 14
        array_push($listaC, $fila['DENTES_BANEADO']);           // 15
        array_push($listaC, $fila['DENDOS_RUT']);               // 16
        array_push($listaC, $nombre_denunciado);                // 17
        array_push($listaC, $fila['DENDOS_DIRECCION']);         // 18
        array_push($listaC, $fila['DENDOS_VIOLENTO']);          // 19
        array_push($listaC, $fila['DENDOS_DESCRIPCION']);       // 20
        array_push($listaC, $fila['INS_RUT']);                  // 21
        array_push($listaC, $fila['DENIAS_OBSERVACION']);       // 22

        $sql_fotos = "SELECT * FROM fotos WHERE fotos.DENIAS_ID = '" . $fila['DENIAS_ID'] . "'";

        $lista_fotos = [];

        foreach($GLOBALS['mysqli']->query($sql_fotos) as $fila_fotos)
        {
            array_push($lista_fotos, $fila_fotos['FOT_URL']);
        }

        array_push($listaC, $lista_fotos);                      // 23

        $sql_videos = "SELECT * FROM videos WHERE videos.DENIAS_ID = '" . $fila['DENIAS_ID'] . "'";

        $lista_videos = [];

        foreach($GLOBALS['mysqli']->query($sql_videos) as $fila_videos)
        {
            array_push($lista_videos, $fila_videos['VID_URL']);
        }

        array_push($listaC, $lista_videos);                     // 24

        if($fila['INS_RUT'] != "")
        {
            $sql_inspector = "SELECT * FROM inspectores WHERE inspectores.INS_RUT = '" . $fila['INS_RUT'] . "'";

            foreach($GLOBALS['mysqli']->query($sql_inspector) as $fila_inspector)
            {
                $nombre_inspector = $fila_inspector['INS_NOMBRE'] . " " . $fila_inspector['INS_APELLIDO'];

                array_push($listaC, $nombre_inspector);                             // 25
                array_push($listaC, $fila_inspector['INS_TELEFONO']);               // 26
                array_push($listaC, $fila_inspector['INS_CORREO']);                 // 27
            }
        }
        else
        {
            array_push($listaC, "");                                                // 25
            array_push($listaC, "");                                                // 26
            array_push($listaC, "");                                                // 27
        }

        array_push($listaF, $listaC);
    }

    cerrar_conexion();

    return $listaF;
}

function asignar_inspector($codigo, $codigo_procesado, $rut_inspector)
{
    abrir_conexion();

    $sql = "SELECT INS_RUT FROM denuncias WHERE denuncias.DENIAS_ID = " . $codigo_procesado;

    if($GLOBALS['mysqli']->query($sql) != null)
    {
        $sql = "UPDATE denuncias SET INS_RUT = '" . $rut_inspector . "', EST_ID = '2' WHERE DENIAS_ID = '" . $codigo_procesado . "'";

        try
        {
            $GLOBALS['mysqli']->query($sql);

            cerrar_conexion();

            return true;
        }
        catch(Exception $e)
        {
            cerrar_conexion();

            return false;
        }
    }
}

function finalizar_denuncia($codigo, $codigo_procesado, $observacion)
{
    abrir_conexion();

    $sql = "UPDATE denuncias SET EST_ID = '3', DENIAS_OBSERVACION = '" . $observacion . "' WHERE DENIAS_ID = '" . $codigo_procesado . "'";

    try
    {
        $GLOBALS['mysqli']->query($sql);

        cerrar_conexion();

        return true;
    }
    catch(Exception $e)
    {
        cerrar_conexion();

        return false;
    }
}

function validar_inicio($rut, $contrasena)
{
    $contrasena = sha1($contrasena);

    abrir_conexion();

    $sql = "SELECT * FROM inspectores WHERE INS_RUT = '" . $rut . "' AND INS_CONTRASENA = '" . $contrasena . "'";

    try
    {
        $resultado = $GLOBALS['mysqli']->query($sql);
        $lista = $resultado->fetch_assoc();
        $resultado->free();
        cerrar_conexion();

        if($lista != null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    catch(Exception $e)
    {
        cerrar_conexion();

        return 0;
    }
}

/* REEMPLAZAR CONTENIDO DE LA FUNCION */
function comprobar_sesion($rut, $dispositivo, $navegador)
{
    abrir_conexion();

    $sql = "SELECT * FROM inspectores WHERE INS_RUT = '" . $rut . "' AND INS_CONTRASENA = '" . $contrasena . "'";

    try
    {
        $resultado = $GLOBALS['mysqli']->query($sql);
        $lista = $resultado->fetch_assoc();
        $resultado->free();
        cerrar_conexion();

        if($lista != null)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    catch(Exception $e)
    {
        cerrar_conexion();

        return 0;
    }
}

function cargar_datos_inspector($rut)
{
    abrir_conexion();

    $sql = "SELECT * FROM inspectores WHERE INS_RUT = '" . $rut . "'";

    $listaF = [];

    foreach($GLOBALS['mysqli']->query($sql) as $fila)
    {
        $listaC = [];

        array_push($listaC, $fila['INS_RUT']);                  // 0
        array_push($listaC, $fila['INS_NOMBRE']);               // 1
        array_push($listaC, $fila['INS_APELLIDO']);             // 2
        array_push($listaC, $fila['INS_TELEFONO']);             // 3
        array_push($listaC, $fila['INS_CORREO']);               // 4
        array_push($listaC, $fila['INS_USUARIO']);              // 5
        array_push($listaC, $fila['INS_CONTRASENA']);           // 6

        array_push($listaF, $listaC);
    }

    cerrar_conexion();

    return $listaF;
}

function actualizar_contrasena($rut, $contrasena)
{
    abrir_conexion();

    $sql = "UPDATE inspectores SET INS_CONTRASENA = '" . $contrasena . "' WHERE INS_RUT = '" . $rut . "'";

    try
    {
        $GLOBALS['mysqli']->query($sql);

        cerrar_conexion();

        return true;
    }
    catch(Exception $e)
    {
        cerrar_conexion();

        return false;
    }
}

?>