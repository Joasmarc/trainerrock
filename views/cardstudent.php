<?php
  require("parts/html1.php");
  require_once("../controllers/controller.php");
  $controller = new Controller();

  session_start();
  if ($_SESSION["tipo"] != "Entrenador") {
    exit(header("location:error.php?REASON=Acceso%20Denegado"));
  }

  if (!empty($_GET["id"])) {
    $userArray = $controller->selectID($_GET["id"]);
  }
?>

  <div class="d-flex justify-content-center mt-4 mb-4">
    <div class="card" style="width: 80%">
      <img src="<?= $userArray["qr"] ?>" class="card-img-top" alt="Codigo QR">
      <div class="card-body text-center">
        <h1 class="h3 text-info"><?= $userArray["tipo"] ?></h1>
        <h1 class="h6 text-secondary">Nombre</h1>
        <h1 class="h3 text-dark"><?= $userArray["nombre"] ?></h1>
        <h1 class="h6 text-secondary">Apellido</h1>
        <h1 class="h3 text-dark"><?= $userArray["apellido"] ?></h1>
        <h1 class="h6 text-secondary">Cedula</h1>
        <h1 class="h3 text-dakr"><?= $userArray["cedula"] ?></h1>
        <h1 class="h6 text-secondary">telefono</h1>
        <h1 class="h3 text-dark" id="phoneNum"><?= $userArray["telefono"] ?></h1>
        <form action="../controllers/listener.php" method="post">
          <input type="hidden" name="REQUEST" value="updatePhone">
          <input type="number" name="newPhone" id="newPhone" hidden class="form-control p-3 fs-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
          <button id="btnSubmitPhone" type="submit" class="btn btn-success my-2" hidden><h1 class="h5 p-2">Actualizar Telefono</h1></button>
        </form>
        <a href="attendancelist.php?id=<?= $userArray["id"] ?>"><button class="btn btn-success my-2"><h1 class="h5 p-2">Lista de Asistencia</h1></button></a>
        <a href="dashboardTable.php"><button class="btn btn-secondary my-2"><h1 class="h5 p-2">Volver</h1></button></a>
      </div>
    </div>
  </div>

<?php
  require("parts/html2.php");
?>