<?php include("./security/seguridad.php");?>
<html>
  <head>
    <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>
  <title>Confirmacion de Mantenimiento de Usuarios</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <br />
  <body>
    <?php

      require_once("ConexionesClass.php");

      $conexiones = new ConexionesTable();

      $nombre=htmlspecialchars($_POST['nombre']);
      $mail=htmlspecialchars($_POST['mail']);

      $conexiones->insertUsers($nombre, $mail);

    ?>
    Ha ingresado el Usuario: <?php echo $nombre; ?>,<br />
    Con el Siguiente Correo: <?php echo $mail; ?> <br />
  </body>
  <div class="boton">
    <a href="./usuarios.php">Volver</a>
  </div>
</html>
