<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <a>Nombre</a>
            <input type="text" name="Nombre" class="form-control" autofocus>
          </div>
          <a>Primer apellido</a>
          <div class="form-group">
            <input type="text" name="Apellido1" class="form-control" autofocus>
          </div>
          <a>Segundo apellido</a>
          <div class="form-group">
            <input type="text" name="Apellido2" class="form-control" autofocus>
          </div>
          <div class="form-group">
            <a>Dni</a>
            <input type="text" name="Dni" class="form-control" autofocus>
          </div>
          <div class="form-group">
            <a>Fecha de nacimiento</a>
            <input type="date" name="FecNacimiento" class="form-control" autofocus>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Alumno</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Dni</th>
            <th>Fecha de Nacimiento</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM alumnos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido1']; ?></td>
            <td><?php echo $row['Apellido2']; ?></td>
            <td><?php echo $row['Dni']; ?></td>
            <td><?php echo $row['FecNacimiento']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['Id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['Id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
