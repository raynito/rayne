<?php include("./security/seguridad.php");?>
<html>
  <head>
    <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>
  <title>Confirmacion de Mantenimiento de Servicios</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <br />
  <body>
    <?php

      require_once("ConexionesClass.php");

      $conexiones = new ConexionesTable();

      $service=htmlspecialchars($_POST['service']);
      $description=htmlspecialchars($_POST['description']);
      $version=htmlspecialchars($_POST['version']);
      $fecha_actual=date("d/m/Y");
      $user=$_POST['user'];
      $cambios="Version Inicial del Servicio";
      $ambiente=1;
      $active=htmlspecialchars($_POST['activel']);
      $server=htmlspecialchars($_POST['server']);
      $url="http://192.168.1.64:5010/".$service."/swagger-ui.html";
      $test=htmlspecialchars($_POST['test']);

      $conexiones->insertServices($service, $description, $version, $fecha_actual, $user, $active, $server, $url, $test);

      $rawdataQ = $conexiones->getLastServiceId();
      $serviceId= $rawdataQ[0][0];

      $conexiones->insertVersion($serviceId, $version, $fecha_actual, $user, $cambios, $ambiente);

    ?>
    Ha ingresado En ambiente de Desarrollo el Servicio: <?php echo $service; ?>,
    <br />
    En el Server de los Servicios <?php echo $server; ?>,
    <br />
    Con la Siguiente descripcion: <?php echo $description; ?>, <br />
    la Version: <?php echo $version?>, <br />
    de Fecha: <?php echo $fecha_actual; ?>, <br />
    Actualizado por el UserId: <?php echo $user; ?>
  </body>
  <div class="boton">
    <a href="./servicios.php">Volver</a>
  </div>
</html>
