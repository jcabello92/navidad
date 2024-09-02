<?php
  include('bd.php');

  if(isset($_GET['form']))
  {
    // REGISTRAR UNA POBLACIÓN
    if($_GET['form'] == 'reg-poblacion')
    {
      $poblacion = '';

      if(isset($_POST['poblacion']))
      {
        $poblacion = $_POST['poblacion'];
      }

      $verificar = verificar_repetido('poblacion', $poblacion);

      // NO EXISTE EL DATO EN LA BASE DE DATOS
      if($verificar == 2)
      {
        // SE REGISTRO CORRECTAMENTE EL DATO EN LA BASE DE DATOS
        if(registrar_poblacion($poblacion))
        {
          header('Location: ../pages/registrar_poblaciones.php?cod=1');
        }
        // HUBO UN ERROR EN EL REGISTRO EN LA BASE DE DATOS
        else
        {
          header('Location: ../pages/registrar_poblaciones.php?cod=2');
        }
      }
      // EXISTE EL DATO EN LA BASE DE DATOS
      else if($verificar == 1)
      {
        header('Location: ../pages/registrar_poblaciones.php?cod=3');
      }
      // HUBO UN ERROR AL COMPROBAR LA BASE DE DATOS
      else
      {
        header('Location: ../pages/registrar_poblaciones.php?cod=4');
      }
    }
  }

  function verificar_repetido($tipo, $dato)
  {
    if($tipo == 'poblacion')
    {
      $sql = "SELECT * FROM poblaciones WHERE POBLACION = '" . $dato . "';";
      return comprobar_repetido($sql);
    }
  }

  function registrar_poblacion($poblacion)
  {
    $sql = "INSERT INTO poblaciones (POBLACION) VALUES('" . $poblacion . "');";
    return agregar($sql);
  }
?>