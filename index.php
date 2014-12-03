<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
      </head>

  <body>
    <div class="container">
      <div class="row">
        <h2>Ejemplo CRUD PHP en Microsoft Azure</h2>
      </div>
      <div class="row">
        <a class="btn" href="registro.php">Agregar Contacto</a>
        <br></br>
      </div>
      <div class="row">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
            </tr>
          </thead>
          <tbody>
            <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM contacto';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. htmlentities($row['Nombre']) . '</td>';
                            echo '<td>'. htmlentities($row['Apellido']) . '</td>';
                            echo '<td><a href="detalle.php?id='.$row['IdContacto'].'">Ver Contacto</a></td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /container -->
  </body>
</html>