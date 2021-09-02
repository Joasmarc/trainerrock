<?php
  $alert = null;
  session_start();

  if (!empty($_SESSION["permitted"]) && $_SESSION["permitted"]) {
    exit(header("location:controllers/listener.php?REQUEST=rol"));
  }

  if (!empty($_GET["msg"])) {
        $alert = 
        "<div class='alert alert-success text-center' role='alert'>"
        .$_GET["msg"].
        "</div>";
  }

  echo $alert
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Login Verificador de asistencia</title>
</head>
<body>
  <h1 class="display-2 text-center text-info">Inicio de Sesion</h1>
  <h1 class="display-4 text-center text-dark">Verificador de Asistencia</h1>
<!-- container form -->
<div class="text-center d-flex justify-content-center my-3">
  <form action="controllers/listener.php" method="POST" class="card border shadow" style="width: 80%">
  <input type="hidden" name="REQUEST" value="login">
  <!-- usuario -->
    <div class="mb-3 px-5">
      <label for="exampleInputEmail1" class="form-label h5 text-secondary mt-3">Usuario</label>
      <input name="user" type="text" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <!-- password -->
    <div class="mb-3 px-5">
      <label for="exampleInputPassword1" class="form-label h5 text-secondary">Contraseña</label>
      <input name="pass" type="password" class="form-control form-control-lg" id="exampleInputPassword1">
    </div>
    <!-- create account -->
    <a class="my-2 btn" href="views/register.php"><h1 class="display-6 text-center text-dark">Crear Cuenta</h1></a>
    <!-- submit -->
    <button type="submit" class="my-2 btn btn-info mx-2 "><h1 class="h4 p-2">Ingresar</h1></button>
  </form>
</div>

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>