<?php
  session_start();
  // session_unset();
  $alert = null;
  if ($_SESSION["permitted"]) {
    if (!empty($_GET["msg"])) {
      switch ($_GET["msg"]) {

        case 'AttendaceTrue':
          $name = $_GET["name"];
          $lastName = $_GET["lastName"];
          $alert = 
          "<div class='alert alert-success text-center' role='alert'>"
          ."Asistencia de <strong>$name</strong> <strong>$lastName</strong> confirmada!!!".
          "</div>";
          break;

        default:
          $alert = "Error de get";
          break;
      }
    }
  }else{
    exit(header("location:error.php?REASON=Acceso%20Denegado"));
  }
  require("parts/html1.php");
  echo $alert;
?>

  <div class="d-flex justify-content-center mt-4 mb-4">
    <div class="card" style="width: 80%">
      <h1 class="h1 text-info text-center"><?= $_SESSION["tipo"] ?></h1>
      <div class="card-body text-center">
        <h1 class="h6 text-secondary">Nombre</h1>
        <h1 class="h3 text-dark"><?= $_SESSION["nombre"] ?></h1>
        <h1 class="h6 text-secondary">Apellido</h1>
        <h1 class="h3 text-dark"><?= $_SESSION["apellido"] ?></h1>
        <h1 class="h6 text-secondary">Cedula</h1>
        <h1 class="h3 text-dakr"><?= $_SESSION["cedula"] ?></h1>
        <h1 class="h6 text-secondary">telefono</h1>
        <h1 class="h3 text-dark" id="phoneNum"><?= $_SESSION["telefono"] ?></h1>
        <form action="../controllers/listener.php" method="post">
          <input type="hidden" name="REQUEST" value="updatePhone">
          <input type="number" name="newPhone" id="newPhone" hidden class="form-control p-3 fs-2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
          <button id="btnSubmitPhone" type="submit" class="btn btn-success my-2" hidden><h1 class="h5 p-2">Actualizar Telefono</h1></button>
        </form>
        <!-- btn Search Student -->
        <a href=""><button type="button" class="btn btn-success my-2"><h1 class="h5 p-2">Buscar Estudiante</h1></button></a>
        <!-- btn Update Phone -->
        <button id="btnUpdatePhone" type="button" class="btn btn-warning my-2"><h1 class="h5 p-2">Editar Telefono</h1></button>
        <!-- btn Close Session -->
        <a href="../controllers/listener.php?REQUEST=closeSession"><button type="button" class="btn btn-danger my-2"><h1 class="h5 p-2">Cerrar Session</h1></button></a>
        
      </div>
    </div>
  </div>


<script src="../js/editPhone.js"></script>
<?php
  require("parts/html2.php");
?>