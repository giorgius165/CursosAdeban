<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'cursos_adeban'
) or die(mysqli_erro($mysqli));

?>
