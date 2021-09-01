<?php
  if (!empty($_GET["error"])) {
    $alert = 
      "<div class='alert alert-danger text-center' role='alert'>"
      .$_GET["error"].
      "</div>";
  }else{
    $alert = null;
  }

  require_once("parts/html1.php");
?>
<?= $alert ?>
<h1 class="display-2 text-center text-info">Crear Cuenta</h1>
  <h1 class="display-4 text-center text-dark">Verificador de Asistencia</h1>
<div class="d-flex justify-content-center my-3 pb-5">
  <form action="../controllers/listener.php" method="POST" class="card border shadow-lg pb-3" style="width: 90%">
  <!-- REQUEST -->
  <input type="hidden" name="REQUEST" value="register">
    <!-- user -->
    <div class="mb-3 px-5">
      <label for="exampleInputEmail1" class="form-label h5 text-secundary pt-3">Nuevo Usuario</label>
      <input name="user" type="text" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <!-- name -->
    <div class="mb-3 px-5">
      <label for="exampleInputEmail1" class="form-label h5 text-secundary">Nombre</label>
      <input name="name" type="text" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <!-- last name -->
    <div class="mb-3 px-5">
      <label for="exampleInputEmail1" class="form-label h5 text-secundary">Apellido</label>
      <input name="lastName" type="text" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <!-- dni -->
    <div class="mb-3 px-5">
      <label for="exampleInputEmail1" class="form-label h5 text-secundary">Cedula</label>
      <input name="dni" type="number" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <!-- phone -->
    <div class="mb-3 px-5">
      <label for="exampleInputEmail1" class="form-label h5 text-secundary">Telefono</label>
      <input name="phone" type="number" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <!-- password 1 -->
    <div class="mb-3 px-5">
      <label for="exampleInputPassword1" class="form-label h5 text-secundary">Nueva Contraseña</label>
      <input name="pass1" type="password" class="form-control form-control-lg" id="exampleInputPassword1" required>
    </div>
    <!-- password 2 -->
    <div class="mb-3 px-5">
      <label for="exampleInputPassword1" class="form-label h5 text-secundary">Repetir Nueva Contraseña</label>
      <input name="pass2" type="password" class="form-control form-control-lg" id="exampleInputPassword1" required>
    </div>
    <!-- create account -->
    <button type="submit" class="my-2 btn btn-info mx-2"><h1 class="h4 p-2 text-black">Crear Cuenta</h1></button>
    <!-- back -->
    <a class="my-2 btn" href="../index.php"><h1 class="display-6 text-center text-dark">Volver</h1></a>
  </form>
</div>

<?php
  require_once("parts/html2.php");
?>