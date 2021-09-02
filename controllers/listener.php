<?php
require_once("controller.php");
$controller = new Controller();

if (!empty($_REQUEST)) {
  switch ($_REQUEST["REQUEST"]) {
    case 'register':
      $controller->register($_POST);
      break;

    case 'login':
      $controller->login($_POST);
      break;
    
    case 'updatePhone':
      $controller->updatePhone($_SESSION["id"],$_POST["newPhone"]);
      break;

    case 'closeSession':
      session_unset();
      session_destroy();
      header("location:../index.php?msg=Session%20Cerrada!!");
      break;

    case 'attendance':
      session_start();
      var_dump($_SESSION);
      if ($_SESSION["permitted"]) {
        $controller->attendance($_GET["id"]);
      }else{
        exit(header("location:error.php?REASON=Acceso%20Denegado"));
      }
      break;
    
    default:
      # code...
      break;
  }
}

?>