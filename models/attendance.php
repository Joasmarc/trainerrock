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

  public function selectDate($id){
    $petition = "SELECT * FROM `asistencia` WHERE idStudent = $id ORDER BY fecha DESC";
    if ($respSQL = $this->conexion->query($petition)) {
      while($row = $respSQL->fetch_assoc()){
        $array[] = [
          "id" => $row["id"],
          "idStudent" => $row["idStudent"],
          "nombre" => $row["name"],
          "apellido" => $row["lastName"],
          "fecha" => $row["fecha"]
        ];
      }
    }
    if(!empty($array))return $array;
    else return null;
  }
}

?>