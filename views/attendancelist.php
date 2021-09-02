<?php
require_once("../controllers/controller.php");
require("parts/html1.php");

session_start();
if ($_SESSION["tipo"] != "Entrenador") {
  exit(header("location:error.php?REASON=Acceso%20Denegado"));
}

$id = $_GET["id"];
$controller = new Controller();
$list = $controller->selectDate($id);
?>

<h1 class="fs-1 text-center my-3"><?= $list[0]["nombre"]." ".$list[0]["apellido"]?></h1>
<div class="d-flex justify-content-center m-3">
  <table class="table table-success table-striped d-flex justify-content-center">
    <tr>
      <th scope="col">Cantidad</th>
      <th scope="col">Fechas</th>
    </tr>

    <?php if (!empty($list)):?>
      <?php $amount = count($list) ?>
    <?php foreach ($list as $value):?>
    <tr>
      <td><?= $amount ?></td>
      <td><?= $value["fecha"] ?></td>
      <?php $amount = $amount-1 ?>
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