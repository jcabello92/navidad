
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
        $sql = "SELECT delegados.DEL_RUT, delegados.DEL_NOMBRE, delegados.DEL_APELLIDO FROM delegados WHERE NOT EXISTS (SELECT juntas_vecinales.DEL_RUT FROM juntas_vecinales WHERE juntas_vecinales.DEL_RUT = delegados.DEL_RUT) ORDER BY DEL_NOMBRE ASC, DEL_APELLIDO ASC, DEL_RUT ASC;";
        
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
      if($tipo != 'JV_NOMBRE')
      {
        $sql = "SELECT * FROM menores, sexos, juntas_vecinales WHERE menores.SEX_ID = sexos.SEX_ID AND menores.JV_ID = juntas_vecinales.JV_ID AND menores." . $tipo . " LIKE '%" . $dato . "%';";
      }
      else
      {
        $sql = "SELECT * FROM menores, sexos, juntas_vecinales WHERE menores.SEX_ID = sexos.SEX_ID AND menores.JV_ID = juntas_vecinales.JV_ID AND juntas_vecinales." . $tipo . " LIKE '%" . $dato . "%';";
      }
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
    if($tipo != '' && $dato != '')
    {
      if($tipo != 'JV_NOMBRE')
      {
        $sql = "SELECT delegados.DEL_RUT, delegados.DEL_NOMBRE, delegados.DEL_APELLIDO, sexos.SEX_NOMBRE, delegados.DEL_FECHA_NACIMIENTO, delegados.DEL_DIRECCION FROM delegados, sexos, juntas_vecinales WHERE delegados.SEX_ID = sexos.SEX_ID AND delegados." . $tipo . " LIKE '%" . $dato . "%';";
      }
      else
      {
        $sql = "SELECT delegados.DEL_RUT, delegados.DEL_NOMBRE, delegados.DEL_APELLIDO, sexos.SEX_NOMBRE, delegados.DEL_FECHA_NACIMIENTO, delegados.DEL_DIRECCION FROM delegados, sexos, juntas_vecinales WHERE delegados.SEX_ID = sexos.SEX_ID AND juntas_vecinales." . $tipo . " LIKE '%" . $dato . "%';";
      }
    }
    else if($tipo == '' || $dato == '')
    {
      $sql = "SELECT delegados.DEL_RUT, delegados.DEL_NOMBRE, delegados.DEL_APELLIDO, sexos.SEX_NOMBRE, delegados.DEL_FECHA_NACIMIENTO, delegados.DEL_DIRECCION FROM delegados, sexos, juntas_vecinales WHERE delegados.SEX_ID = sexos.SEX_ID;";
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
        if($tipo == 'JV_NOMBRE')
        {
            $sql = "SELECT * FROM juntas_vecinales, poblaciones, delegados WHERE juntas_vecinales.POB_ID = poblaciones.POB_ID AND juntas_vecinales.DEL_RUT = delegados.DEL_RUT AND juntas_vecinales." . $tipo . " LIKE '%" . $dato . "%';";
        }
        else if($tipo == 'POB_NOMBRE')
        {
            $sql = "SELECT * FROM juntas_vecinales, poblaciones, delegados WHERE juntas_vecinales.POB_ID = poblaciones.POB_ID AND juntas_vecinales.DEL_RUT = delegados.DEL_RUT AND poblaciones." . $tipo . " LIKE '%" . $dato . "%';";
        }
        else if($tipo == 'DELEGADO')
        {
            $sql = "SELECT * FROM juntas_vecinales, poblaciones, delegados WHERE juntas_vecinales.POB_ID = poblaciones.POB_ID AND juntas_vecinales.DEL_RUT = delegados.DEL_RUT AND (delegados.DEL_RUT LIKE '%" . $dato . "%' OR delegados.DEL_NOMBRE LIKE '%" . $dato . "%' OR delegados.DEL_APELLIDO LIKE '%" . $dato . "%');";
        }
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

?>