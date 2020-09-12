<?php
  
require('./conector.php');

  $con = new ConectorBD();

  if($con->initConexion('agenda')=='OK'){
    
  
    $initCalendario= $con->consultar(['usuarios'],
       ['email','id'], 'WHERE email="juan" AND psw="1"');

    if ($initCalendario->num_rows != 0) {
          $response['user'] = $initCalendario->fetch_assoc();
      
      
    }else $response['acceso'] = 'Usuario o contraseña incorrectos';
  }
    
  echo json_encode($response);
   
  

  $con->cerrarConexion();



 ?>



