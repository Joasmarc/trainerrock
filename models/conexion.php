<?php

class Conexion{
  private $host = "localhost";
  private $root = "root";
  private $pass = "";
  private $daba = "verificador_asistencia";

  public $conexion;

  public function __construct(){
    $this->conexion = new mysqli($this->host,$this->root,$this->pass,$this->daba);
  }
}

?>