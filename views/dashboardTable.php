<?php
require_once("../controllers/controller.php");
require("parts/html1.php");
session_start();
if ($_SESSION["tipo"] != "Entrenador") {
  exit(header("location:error.php?REASON=Acceso%20Denegado"));
}
$controller = new Controller();
$list = $controller->selectAll();
?>
<div class="m-3 d-flex justify-content-center" style="width: 85%">
  <div class="input-group input-group-lg m-3">
    <span class="btn btn-info" id="inputGroup-sizing-lg">Buscar</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
  </div>
</div>

<div class="d-flex justify-content-center">
  <table class="table table-success table-striped d-flex justify-content-center">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Opciones</th>
    </tr>

    <?php foreach ($list as $value):?>
    <tr>
      <td><?= $value["nombre"] ?></td>
      <td><?= $value["apellido"] ?></td>
      <td class="d-flex justify-content-center"><a href="cardstudent.php?id=<?= $value["id"] ?>"><button class="btn btn-info">Ver</button></a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php
require("parts/html1.php");
?>