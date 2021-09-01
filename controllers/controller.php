<?php

require_once("../models/users.php");
require_once("../models/accounts.php");

class Controller{

  private $users;
  private $accounts;

  public function __construct(){
    $this->users = new Users();
    $this->accounts = new Accounts();
  }

  public function register($arrayRegister){
    $ready = 0;

    // validate repeat
    if($this->users->repeat($arrayRegister["user"]) >= 1){
      exit(header("location:../views/register.php?error=Usuario%20Ya%20Existe"));
    }else{
      $ready++;
    }

    // validate dni
    if (preg_match("/^([0-9])*$/", $arrayRegister["dni"]) === 0) {
      exit(header("location:../views/register.php?error=Numero%20de%20identificacion%20no%20valido%20solo%20admite%20numeros!!!"));
    }else{
      $ready++;
    }
    
    // validate phone
    if (preg_match("/^([0-9])*$/", $arrayRegister["phone"]) === 0) {
      exit(header("location:../views/register.php?error=Numero%20de%20telefono%20no%20esta%20permitido%20solo%20admite%20numeros!!!"));
    }else{
      $ready++;
    }

    // validate pass
    if ($arrayRegister["pass1"] === $arrayRegister["pass2"]) {
      $hashPass = password_hash($arrayRegister["pass1"], PASSWORD_BCRYPT);
      $arrayRegister["hashPass"] = $hashPass;
      $ready++;
    }else{
      exit(header("location:../views/register.php?error=Contraseñas%20No%20Coinsiden"));
    }

    if($ready === 4){
      $this->users->register($arrayRegister);
    }else{
      exit(header("location:../views/register.php?error=No%20Se%20Pudo%20Crear%20Cuenta"));
    }

  }

  public function login($arrayLogin){
    $user = $arrayLogin["user"];
    $pass = $arrayLogin["pass"];
    $consult = $this->accounts->login($user);

    if ($consult === false) {
      exit(header("location:../views/register.php?error=Cuenta%20No%20Existe%20Puede%20Crear%20Una%20Nueva"));
    }else{
      if(password_verify($pass,$consult["pass"])){
        $client = $this->users->selectID($consult["id"]);

        session_start();
        $_SESSION = $client;
        $_SESSION["permitted"] = true;

        if ($_SESSION["tipo"] === "Estudiante") {
          return header("location:../views/dashboard.php");
        }else if($_SESSION["tipo"] === "Administrador"){
          // retornar dashboard admin
        }
      }else{
        exit(header("location:../views/register.php?error=Cuenta%20No%20Existe%20Puede%20Crear%20Una%20Nueva"));
      }
    }

  }

  public function updatePhone($id,$newPhone){
    if($this->users->updatePhone($id,$newPhone)){
      $_SESSION["telefono"] = $newPhone;
      return header("location:../views/dashboard.php?msg=uptNumTrue");
    }else{
      return header("location:../views/dashboard.php?msg=uptNumFalse");
    }
  }
}

?>