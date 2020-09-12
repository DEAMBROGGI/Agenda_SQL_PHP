<?php
require('./conector.php');
  $user = $_POST['username'];
  $psw = $_POST['passw'];

  $con = new ConectorBD('localhost','t_general','1234');

  $response['conexion'] = $con->initConexion('agenda');

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['usuarios'],
       ['id'], 'WHERE email="'.$user.'" AND psw="'.$psw.'"');

    if ($resultado_consulta->num_rows != 0) {
      $response['acceso'] = 'concedido';
      $response['id'] = $resultado_consulta;
      
    }else $response['acceso'] = 'Usuario o contraseña incorrectos';
  }
  
  echo json_encode($response);
 
  

  $con->cerrarConexion();



 ?>
