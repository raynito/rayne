<html>
  <head>
    <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>
  <title>Confirmacion de Mantenimiento de Progreso</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <br />
  <body>
    <?php

      require_once("ConexionesClass.php");

      $conexiones = new ConexionesTable();

      $service=$_POST['nombre'];
      $port=$_POST['port'];
      $webserver=htmlspecialchars($_POST['webserver']);
      $cs=htmlspecialchars($_POST['menucs']);
      $es=htmlspecialchars($_POST['menues']);
      $sbas=htmlspecialchars($_POST['menusba']);
      $ribbon=htmlspecialchars($_POST['menurib']);
      $hystrix=htmlspecialchars($_POST['menuhy']);
      $hechache=htmlspecialchars($_POST['menuhe']);
      $zuul=htmlspecialchars($_POST['menuzu']);
      $oauth=htmlspecialchars($_POST['menuoa']);

      $conexiones->insertProgress($service, $port, $webserver, $cs, $es, $sbas, $ribbon, $hystrix, $hechache, $zuul, $oauth);

    ?>
    Ha ingresado El Progreso para el servicio Seleccionado <br />

  </body>
  <div class="boton">
    <a href="./implementation.php">Volver</a>
  </div>
</html>
