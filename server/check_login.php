<?php
require('./conector.php');

  $con = new ConectorBD('localhost','t_general','1234');

  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['usuarios'],
       ['email', 'psw'], 'WHERE email="'.$_POST['username'].'" AND psw="'.$_POST['passw'].'"');

    if ($resultado_consulta->num_rows != 0) {
      $response['acceso'] = 'concedido';
    }else $response['acceso'] = 'Usuario o contraseña incorrectos';
  }

  echo json_encode($response);
  

  $con->cerrarConexion();



 ?>
