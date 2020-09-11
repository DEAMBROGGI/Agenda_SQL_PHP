<?php


  class ConectorBD
  {
    private $host = 'localhost';
    private $user = 't_general';
    private $password = '1234';
    private $conexion;

    function initConexion($nombre_db){
      $this->conexion = mysqli_connect($this->host, $this->user, $this->password, $nombre_db);
      if ($this->conexion->connect_error) {
        return "Error:" . $this->conexion->connect_error;
      }else {
        return "OK";
      }
    }

    
    function ejecutarQuery($query){
        return $this->conexion->query($query);
    }

    function getConexion(){
      return $this->conexion;
    }

    function cerrarConexion(){
      $this->conexion->close();
    }

    function consultar($tablas, $campos, $condicion = ""){
      $sql = "SELECT ";
      $ultima_key = end(array_keys($campos));
      foreach ($campos as $key => $value) {
        $sql .= $value;
        if ($key!=$ultima_key) {
          $sql.=", ";
        }else $sql .=" FROM ";
      }

      $ultima_key = end(array_keys($tablas));
      foreach ($tablas as $key => $value) {
        $sql .= $value;
        if ($key!=$ultima_key) {
          $sql.=", ";
        }else $sql .= " ";
      }

      if ($condicion == "") {
        $sql .= ";";
      }else {
        $sql .= $condicion.";";
      }
      return $this->ejecutarQuery($sql);
    }


  }

  





 ?>
