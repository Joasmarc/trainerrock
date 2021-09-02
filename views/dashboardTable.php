<?php
require_once("../controllers/controller.php");
require("parts/html1.php");
session_start();
if ($_SESSION["tipo"] != "Entrenador") {
  exit(header("location:error.php?REASON=Acceso%20Denegado"));
}
$controller = new Controller();
$msg = null;
$viewTable = null;
$list = null;

if (empty($_GET["search"])) {
  $list = $controller->selectAll();
}else {
  $list = $controller->searchName($_GET["search"]);
  if ($list === null) {
    $msg = "Ningun Resultado";
    $viewTable = "hidden";
  }
}

?>
<div class="m-3">
  <div class="input-group input-group-lg d-flex justify-content-center">
    <form class="justify-content-center" action="../controllers/listener.php" method="post">
      <input type="hidden" name="REQUEST" value="search">
      <input name="string" type="text" class="col-12 form-control my-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
      <button type="submit" class="btn btn-info col-12" id="inputGroup-sizing-lg">Buscar</button>
    </form>
  </div>
</div>

<h1 class="fs-1 text-center"><?= $msg ?></h1>

<div class="d-flex justify-content-center">
  <table class="table table-success table-striped d-flex justify-content-center">
    <tr <?= $viewTable ?> >
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Opciones</th>
    </tr>

    <?php if (!empty($list)):?>
    <?php foreach ($list as $value):?>
    <tr>
      <td><?= $value["nombre"] ?></td>
      <td><?= $value["apellido"] ?></td>
      <td class="d-flex justify-content-center"><a href="cardstudent.php?id=<?= $value["id"] ?>"><button class="btn btn-info p-2">Ver</button></a></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </table>
</div>

<div class="d-flex justify-content-center">
  <a href="../index.php"><button class="btn btn-secondary my-2"><h1 class="h5 p-2">Volver</h1></button></a>
</div>

<?php
require("parts/html1.php");
?>