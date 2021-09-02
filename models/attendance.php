<?php

require_once("conexion.php");

class Attendance extends Conexion{

  public function register($userArray){

    $id = $userArray["id"];
    $nombre = $userArray["nombre"];
    $apellido = $userArray["apellido"];

    $petition = "INSERT INTO asistencia(idStudent,name,lastName) VALUES('$id','$nombre','$apellido')";
    if($this->conexion->query($petition)){
      return true;
    }else{
      exit(header("location:../views/error.php?REASON=Tomar%20Asistencia"));
    }
  }

}

?>