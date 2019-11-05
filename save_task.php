<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['Nombre'];
  $apellido1 = $_POST['Apellido1'];
  $apellido2 = $_POST['Apellido2'];
  $dni = $_POST['Dni'];
  $fecNacimiento = $_POST['FecNacimiento'];
  $query = "INSERT INTO alumnos(Nombre, Apellido1, Apellido2, Dni, FecNacimiento) VALUES ('$nombre', '$apellido1', '$apellido2', '$dni', '$fecNacimiento')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
