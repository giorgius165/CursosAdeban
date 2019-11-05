<?php
include("db.php");
$Nombre = '';
$Apellido1= '';
$Apellido2= '';
$Dni= '';
$FecNacimiento= '';


if  (isset($_GET['Id'])) {
  $id = $_GET['Id'];
  $query = "SELECT * FROM alumnos WHERE Id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Apellido1 = $row['Apellido1'];
    $Apellido2 = $row['Apellido2'];
    $Dni = $row['Dni'];
    $FecNacimiento = $row['FecNacimiento'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['Id'];
  $Nombre= $_POST['Nombre'];
  $Apellido1 = $_POST['Apellido1'];
  $Apellido2 = $_POST['Apellido2'];
  $Dni = $_POST['Dni'];
  $FecNacimiento = $_POST['FecNacimiento'];
  $query = "UPDATE alumnos set Nombre = '$Nombre', Apellido1 = '$Apellido1', Apellido2 = '$Apellido2', Dni = '$Dni', FecNacimiento = '$FecNacimiento' WHERE Id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Alumno Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['Id']; ?>" method="POST">
        <div class="form-group">
          <a>Nombre</a>
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>">
        </div>
        <div class="form-group">
          <a>Apellido1</a>
          <input name="Apellido1" type="text" class="form-control" value="<?php echo $Apellido1; ?>">
        </div>
        <div class="form-group">
          <a>Apellido2</a>
          <input name="Apellido2" type="text" class="form-control" value="<?php echo $Apellido2; ?>">
        </div>
        <div class="form-group">
          <a>Dni</a>
          <input name="Dni" type="text" class="form-control" value="<?php echo $Dni; ?>">
        </div>
        <div class="form-group">
          <a>Fecha nacimiento</a>
          <input name="FecNacimiento" type="date" class="form-control" value="<?php echo $FecNacimiento; ?>">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
