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
      $active = 1;
      $trans = explode("@",$mail);
      $username = $trans[0];
      $password = 123456;

      $conexiones->insertUsers($nombre, $mail, $active, $username, $password);

    ?>
    Ha ingresado el Usuario: <?php echo $nombre; ?>,<br />
    Con el Siguiente Correo: <?php echo $mail; ?>,<br />
    Su Usuario en el Sistema es: <?php echo $username; ?> <br />
  </body>
  <div class="boton">
    <a href="./usuarios.php">Volver</a>
  </div>
</html>
