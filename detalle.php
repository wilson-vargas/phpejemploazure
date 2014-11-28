<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM contacto where IdContacto = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Contacto</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Nombre: </label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Nombre'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Apellido:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Apellido'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Correo:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Correo'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Telefono:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Telefono'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Direccion:</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Direccion'];?>
                            </label>
                        </div>
                      </div>                   
                      <div class="form-actions">
                          <a class="btn" href="index.php">Atr&aacute;s</a>
                       </div>
                    </div>
                </div>
                 
    </div> 
  </body>
</html>