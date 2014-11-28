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
                        <h3>Registrar Contacto</h3>
                    </div>
             
                    <form class="form-horizontal" action="registro.php" method="post">
                      <div class="control-group<?php echo !empty($nombreError)?' error':'';?>">
                        <label class="control-label">Nombre:</label>
                        <div class="controls">
                            <input name="nombre" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                            <?php if (!empty($nombreError)): ?>
                                <span class="help-inline"><?php echo $nombreError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($apellidoError)?'error':'';?>">
                        <label class="control-label">Apellido:</label>
                        <div class="controls">
                            <input name="apellido" type="text"  placeholder="Apellido" value="<?php echo !empty($apellido)?$apellido:'';?>">
                            <?php if (!empty($apellidoError)): ?>
                                <span class="help-inline"><?php echo $apellidoError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($correoError)?'error':'';?>">
                        <label class="control-label">Correo:</label>
                        <div class="controls">
                            <input name="correo" type="text"  placeholder="Correo" value="<?php echo !empty($correo)?$correo:'';?>">
                            <?php if (!empty($correoError)): ?>
                                <span class="help-inline"><?php echo $correoError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
                        <label class="control-label">Telefono:</label>
                        <div class="controls">
                            <input name="telefono" type="text"  placeholder="Telefono" value="<?php echo !empty($telefono)?$telefono:'';?>">
                            <?php if (!empty($telefonoError)): ?>
                                <span class="help-inline"><?php echo $telefonoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($direccionError)?'error':'';?>">
                        <label class="control-label">Direccion:</label>
                        <div class="controls">
                            <input name="direccion" type="text" placeholder="Direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">
                            <?php if (!empty($direccionError)): ?>
                                <span class="help-inline"><?php echo $direccionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Registrar</button>
						  <a class="btn" href="index.php">Atr&aacute;s</a>
                      </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {

        $nombreError = null;
		$apellidoError = null;
		$correoError = null;
        $direccionError = null;
        $telefonoError = null;
         
        
        $nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        
         
        
        $validador = true;
        if (empty($nombre)) {
            $nombreError = 'Por favor ingrese el nombre';
            $validador = false;
        }
         
		if (empty($apellido)) {
            $apellidoError = 'Por favor ingrese un apellido';
            $validador = false;
        }

		if (empty($correo)) {
            $correoError = 'Por favor ingrese un correo';
            $validador = false;
        } else if ( !filter_var($correo,FILTER_VALIDATE_EMAIL) ) {
            $correoError = 'Por favor ingrese un correo valido. Ejemplo: micorreo@mail.com';
            $validador = false;
        }

		if (empty($telefono)) {
            $telefonoError = 'Por favor ingrese un telefono';
            $validador = false;
        }
         

		if (empty($direccion)) {
            $direccionError = 'Por favor ingrese una direccion';
            $validador = false;
        }
        
        if ($validador) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO contacto (nombre,apellido,correo,telefono,direccion) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nombre,$apellido,$correo,$telefono,$direccion));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>