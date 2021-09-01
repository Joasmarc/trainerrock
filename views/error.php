<?php
require_once("parts/html1.php");
?>

<div class="d-flex justify-content-center text-center my-3 pb-5">
  <div class="card shadow-lg p-5" style="width: 80%;">
    <h1 class="h2 text-warning">Oops! ha ocurrido un error</h1>
    <h1 class="h2 text-danger"><?= $_GET["REASON"] ?></h1>
    <a href="../index.php"><button class="my-2 btn btn-secondary mx-2"><h1 class="h4 p-2 text-black">Volver</h1></button></a>
  </div>
</div>

<?php
require_once("parts/html2.php");
?>
