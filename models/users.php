<?php
require_once("../phpqrcode/qrlib.php");
require_once("conexion.php");

class Users extends Conexion{

  public function selectAll(){
    $petition = "SELECT * FROM usuarios WHERE tipo='Estudiante'";
    if ($respSQL = $this->conexion->query($petition)) {
      while($row = $respSQL->fetch_assoc()){
        $array[] = [
          "id" => $row["id"],
          "nombre" => $row["nombre"],
          "apellido" => $row["apellido"],
          "cedula" => $row["cedula"],
          "telefono" => $row["telefono"],
          "tipo" => $row["tipo"],
          "qr" => $row["qr"]
        ];
      }
    }
    if(!empty($array))return $array;
    else return null;
  }

  public function countAll(){
    $petition = "SELECT * FROM usuarios";
    $respSQL = $this->conexion->query($petition);
    return $respSQL->num_rows;
  }

  public function selectID($id){
    $petition = "SELECT * FROM usuarios WHERE id='$id'";
    if ($respSQL = $this->conexion->query($petition)) {
      $row = $respSQL->fetch_assoc();
      $array = [
        "id" => $row["id"],
        "nombre" => $row["nombre"],
        "apellido" => $row["apellido"],
        "cedula" => $row["cedula"],
        "telefono" => $row["telefono"],
        "tipo" => $row["tipo"],
        "qr" => $row["qr"],
      ];

      return $array;
    }else{
      header("location:../views/error.php?REASON=Seleccionar%20datos%20de%20tabla");
    }
  }

  public function repeat($user){
    $petition = "SELECT * FROM cuentas WHERE user = '$user'";
    $result = $this->conexion->query($petition);
    $result = $result->num_rows;

    return $result;
  }

  public function register($arrayRegister){

    $name = ucfirst($arrayRegister['name']);
    $lastName = ucfirst($arrayRegister['lastName']);
    $dni = $arrayRegister['dni'];
    $phone = $arrayRegister['phone'];
    $user = $arrayRegister["user"];
    $password = $arrayRegister["hashPass"];

    // creating qr
    $numID = $this->countAll();
    $numID = $numID+1;
    $dir = "../qr/";
    $filename = $dir.strval($numID).".png";
    $size=15;
    $level="H";
    $frameSize = 3;
    // url
    // $host= $_SERVER["HTTP_HOST"];
    $host="192.168.1.4/";
    $url= $_SERVER["REQUEST_URI"];
    $link = $host."/verificador_asistencia/controllers/listener.php";
    $contenido = "http:/".$link."?REQUEST=attendance&id=$numID";
    QRcode::png($contenido,$filename,$level,$size,$frameSize);

    $petition = "INSERT INTO usuarios(nombre,apellido,cedula,telefono,tipo,qr) VALUES('$name', '$lastName', '$dni', '$phone','Estudiante','$filename')";
    if ($result = $this->conexion->query($petition)) {
      $petition = "INSERT INTO cuentas(user,pass) VALUES('$user','$password')";
      if ($result = $this->conexion->query($petition)) {
        header("location:../index.php?msg=Cuenta%20Creada!!");
      }else{
        header("location:../views/error.php?REASON=Crear%20Cuenta");
      }
    }else{
      header("location:../views/error.php?REASON=Ingresar%20Datos");
    }
  }

  public function updatePhone($id, $newPhone){
    $petition = "UPDATE usuarios SET telefono='$newPhone' WHERE id=$id";
    if ($result = $this->conexion->query($petition)) {
      return $result;
    }else{
      exit(header("location:../views/error.php?REASON=Problema%20Actualizar%20Numero"));
    }
  }

  public function searchName($string){
    $petition = "SELECT * FROM `usuarios` WHERE CONCAT(nombre,' ',apellido) LIKE '%$string%'";
    
    if ($respSQL = $this->conexion->query($petition)) {
      while($row = $respSQL->fetch_assoc()){
        $array[] = [
          "id" => $row["id"],
          "nombre" => $row["nombre"],
          "apellido" => $row["apellido"],
          "cedula" => $row["cedula"],
          "telefono" => $row["telefono"],
          "tipo" => $row["tipo"],
          "qr" => $row["qr"]
        ];
      }

      if(!empty($array))return $array;
    }else return null;
  }
}

?>