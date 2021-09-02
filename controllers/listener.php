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
      session_start();
      $controller->updatePhone($_SESSION["id"],$_POST["newPhone"]);
      break;

    case 'closeSession':
      session_start();
      session_unset();
      session_destroy();
      header("location:../index.php?msg=Session%20Cerrada!!");
      break;

    case 'attendance':
      session_start();
      if ($_SESSION["permitted"]) {
        $controller->attendance($_GET["id"]);
      }else{
        exit(header("location:../views/error.php?REASON=Acceso%20Denegado"));
      }
      break;

    case 'rol':
      session_start();
      $msg = null;
      if (!empty($_GET["msg"])) $msg = $_GET["msg"];
      if ($_SESSION["tipo"] === "Entrenador") return header("location:../views/dashboardT.php?msg=$msg");
      if ($_SESSION["tipo"] === "Estudiante") return header("location:../views/dashboard.php?msg=$msg");
      break;
    
    default:
      exit(header("location:../views/error.php?REASON=Error%20De%20REQUEST"));
      break;
  }
}

?>