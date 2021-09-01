<?php

require_once("conexion.php");

class Accounts extends Conexion{

  public function login($user){
    $petition = "SELECT * FROM cuentas WHERE user = '$user'";
    $result = $this->conexion->query($petition);
    $count = $result->num_rows;
    

    if ($count > 0) {
      $row = $result->fetch_assoc();
      $array =[
        "id" => $row["id"],
        "user" => $row["user"],
        "pass" => $row["pass"]
      ];
      return $array;
    }else{
      return false;
    }


  }

}

?>