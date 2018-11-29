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
          <th colspan ="8" class="table-diff2">Creacion</th>
        </tr>
        <tr>
          <th class="table-diff2">Service</th>
          <th class="table-diff2">Description</th>
          <th class="table-diff2">Version</th>
          <th class="table-diff2">Update User</th>
          <th class="table-diff2">Active</th>
          <th class="table-diff2">Servidor</th>
          <th class="table-diff2">Testeable</th>
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
                $query = $mysqli -> query ("SELECT id, name FROM services WHERE inActive = 'Si'");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id_user].'">'.$valores[nombre].'</option>';
                }
              ?>
            </select>
          </th>
          <th class="table-diff2">
            <select name="activel" id="activel" onChange="document.form.submit()">
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </th>
          <th class="table-diff2">
            <select name="server" id="server" onChange="document.form.submit()">
              <option value="Simples">Simples</option>
              <option value="Compuestos">Compuestos</option>
            </select>
          </th>
          <th class="table-diff2">
            <select name="test" id="test" onChange="document.form.submit()">
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </th>
        </tr>
        <tr>
			  	<th colspan="7" class="table-diff">
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
        <th class="table-diff2">#</th>
        <th class="table-diff2">Servicio</th>
        <th class="table-diff2">Descripcion</th>
        <th class="table-diff2">Version</th>
        <th class="table-diff2">Update Date</th>
        <th class="table-diff2">Update User</th>
        <th class="table-diff2">Active</th>
        <th class="table-diff2">Server</th>
        <th class="table-diff2">Testeable</th>
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
            $active=$rawdataQ[$i][5];
            $server=$rawdataQ[$i][6];
            $test=$rawdataQ[$i][7];
      ?>
           <tr>
             <td><?php echo $i + 1; ?></td>
             <td class="td-diff"><?php echo $servicio; ?></td>
             <td class="td-diff"><?php echo $description; ?></td>
             <td><?php echo $version; ?></td>
             <td><?php echo $fecha_actual; ?></td>
             <td><?php echo $user; ?></td>
             <td><?php echo $active; ?></td>
             <td><?php echo $server; ?></td>
             <td><?php echo $test; ?></td>
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
