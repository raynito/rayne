<html>
  <head>
    <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>
  <title>Confirmacion de Mantenimiento de Versiones de Servicios</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <br />
  <body>
    <?php

      require_once("ConexionesClass.php");

      $conexiones = new ConexionesTable();

      $service=$_POST['nombre'];
      $version=htmlspecialchars($_POST['version']);
      $fecha_actual=date("d/m/Y");
      $user=$_POST['user'];
      $cambios=$_POST['cambios'];
      $ambiente=$_POST['ambiente'];

      $conexiones->insertVersion($service, $version, $fecha_actual, $user, $cambios, $ambiente);
      $conexiones->updateService($service, $version, $fecha_actual, $user);

    ?>
    Ha Actualizado el Servicio Con la Version: <?php echo $version?>, <br />
    de Fecha: <?php echo $fecha_actual; ?>,
    Generado por el UserId: <?php echo $user; ?>,
    Modificando: <?php echo $cambios; ?>
  </body>
  <div class="boton">
    <a href="./versiones.php">Volver</a>
  </div>
</html>
