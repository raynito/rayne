<?php include("./security/seguridad.php");?>
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
      $hecache=htmlspecialchars($_POST['menuhe']);
      $zuul=htmlspecialchars($_POST['menuzu']);
      $oauth=htmlspecialchars($_POST['menuoa']);
      $varnish = 0;

      $rawdata = $conexiones->queryProgress($service);
      for($i=0;$i<count($rawdata);$i++){
        $varnish = $rawdata[$i][0];
      }
      if ($varnish > 0){
        $conexiones->updateProgress($service, $port, $webserver, $cs, $es, $sbas, $ribbon, $hystrix, $hecache, $zuul, $oauth);
        echo "Ha Modificado El Progreso para el servicio Seleccionado";
      }else{
        $conexiones->insertProgress($service, $port, $webserver, $cs, $es, $sbas, $ribbon, $hystrix, $hecache, $zuul, $oauth);
        echo "Ha Ingresado El Progreso para el servicio Seleccionado";
      }
    ?>
    <br />

  </body>
  <div class="boton">
    <a href="./implementation.php">Volver</a>
  </div>
</html>
