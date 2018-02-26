<?php include("./security/seguridad.php");?>
<html>
  <head><link rel="icon" type="image/png" href="images/favicon.png" /></head>
  <title>Mantenimiento de Servicios</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <div class="centered shadow spacing">
    Mantenimiento de Servicios
  </div>
  <br />
	<body class="centered shadow spacing">
    <div class="inLine">
      <?php require_once("ConexionesClass.php");?>
      <form action="accion.php" method="post">
      <table>
        <tr>
          <th colspan ="4" class="table-diff2">Creacion</th>
        </tr>
        <tr>
          <th class="table-diff2">Service</th>
          <th class="table-diff2">Description</th>
          <th class="table-diff2">Version</th>
          <th class="table-diff2">Update User</th>
        </tr>
        <tr>
          <th class="table-diff2"><input type="text" name="service" /></th>
          <th class="table-diff2"><input type="text" name="description" /></th>
          <th class="table-diff2"><input type="text" name="version" /></th>
          <th>
            <select name="user" id="user" onChange="document.form.submit()">
              <option value="0">Selección:</option>
              <?php
                $mysqli = new mysqli('localhost', 'root', '', 'metrics');
                $query = $mysqli -> query ("SELECT id_user, nombre FROM users");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id_user].'">'.$valores[nombre].'</option>';
                }
              ?>
            </select>
          </th>
        </tr>
        <tr>
			  	<th colspan="4" class="table-diff">
            <input type="submit" value="Guardar"/>
          </th>
			  </tr>
      </table>
      </form>
    </div>
    <br />
    <div class="inLine">
    <table>
      <tr>
        <th class="table-diff2">Servicio</th>
        <th class="table-diff2">Descripcion</th>
        <th class="table-diff2">Version</th>
        <th class="table-diff2">Fecha</th>
        <th class="table-diff2">Update User</th>
      </tr>
      <?php
          $conexiones = new ConexionesTable();
          $rawdataQ = $conexiones->getServicesInfo();
           for($i=0;$i<count($rawdataQ);$i++){
            $servicio=$rawdataQ[$i][0];
            $description=$rawdataQ[$i][1];
            $version=$rawdataQ[$i][2];
            $fecha_actual=$rawdataQ[$i][3];
            $user=$rawdataQ[$i][4];
      ?>
           <tr>
             <td class="td-diff"><?php echo $servicio; ?></td>
             <td class="td-diff"><?php echo $description; ?></td>
             <td><?php echo $version; ?></td>
             <td><?php echo $fecha_actual; ?></td>
             <td><?php echo $user; ?></td>
           </tr>
      <?php
          }
      ?>
    </table>
  </br />
  </div>
    <div class="centered boton">
      <a href="./hola.php">Volver</a>
    </div>
  </body>
</html>
