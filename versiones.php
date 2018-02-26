<?php include("./security/seguridad.php");?>
<html>
  <head><link rel="icon" type="image/png" href="images/favicon.png" /></head>
  <title>Mantenimiento de Versiones de Servicios</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <div class="centered shadow spacing">
    Mantenimiento de Versiones de Servicios
  </div>
  <br />
	<body class="centered spacing">
    <br />
    <div class="inLine">
      <?php require_once("ConexionesClass.php");?>
      <form action="accion2.php" method="post">
      <table>
        <tr>
          <th colspan ="5" class="table-diff2">Versionamiento</th>
        </tr>
        <tr>
          <th class="table-diff2">Service</th>
          <th class="table-diff2">Version</th>
          <th class="table-diff2">User</th>
          <th class="table-diff2">Cambios</th>
          <th class="table-diff2">Ambiente</th>
        </tr>
        <tr>
          <th>
            <select name="nombre" id="nombre" onChange="document.form.submit()">
              <option value="0">Selección:</option>
              <?php
                $mysqli = new mysqli('localhost', 'root', '', 'metrics');
                $query = $mysqli -> query ("SELECT id, name FROM services");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id].'">'.$valores[name].'</option>';
                }
              ?>
            </select>
          </th>
          <th class="table-diff2">
            <input type="text" name="version" />
          </th>
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
          <th class="table-diff2">
            <input type="text" name="cambios" />
          </th>
          <th>
            <select name="ambiente" id="ambiente" onChange="document.form.submit()">
              <option value="0">Selección:</option>
              <?php
                $mysqli = new mysqli('localhost', 'root', '', 'metrics');
                $query = $mysqli -> query ("SELECT id, nombre FROM environments");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                }
              ?>
            </select>
          </th>
        </tr>
        <tr>
			  	<th colspan="5" class="table-diff">
            <input type="submit" class="centered boton" value="Guardar"/>
          </th>
			  </tr>
      </table>
      </form>
    </div>
    <br />
    <div class="inLine">
    <table class="mostrar">
      <tr>
        <th colspan="5" class="table-diff5 fuente_min">Ambiente de Desarrollo</th>
      </tr>
      <tr>
        <th class="td-diff fuente_min">Servicio</th>
        <th class="td-diff fuente_min">Version</th>
        <th class="td-diff fuente_min">User</th>
        <th class="td-diff fuente_min">Cambios</th>
        <th class="td-diff fuente_min">Fecha</th>
      </tr>
      <?php
          $conexiones = new ConexionesTable();
          $rawdataQ = $conexiones->getVersionDevInfo();
           for($i=0;$i<count($rawdataQ);$i++){
            $servicio=$rawdataQ[$i][0];
            $version=$rawdataQ[$i][1];
            $user=$rawdataQ[$i][2];
            $cambios=$rawdataQ[$i][3];
            $fecha=$rawdataQ[$i][4];
      ?>
           <tr>
             <td class="td-diff fuente_min"><?php echo $servicio; ?></td>
             <td class="td-diff fuente_min"><?php echo $version; ?></td>
             <td class="td-diff fuente_min"><?php echo $user; ?></td>
             <td class="td-diff fuente_min" width="200"><?php echo $cambios; ?></td>
             <td class="td-diff fuente_min"><?php echo $fecha; ?></td>
           </tr>
      <?php
          }
      ?>
    </table>
    </br />
    </div>
    <div class="inLine">
    <table class="mostrar">
      <tr>
        <th colspan="5" class="table-diff6 fuente_min">Ambiente de Calidad</th>
      </tr>
      <tr>
        <th class="td-diff2 fuente_min">Servicio</th>
        <th class="td-diff2 fuente_min">Version</th>
        <th class="td-diff2 fuente_min">User</th>
        <th class="td-diff2 fuente_min">Cambios</th>
        <th class="td-diff2 fuente_min">Fecha</th>
      </tr>
      <?php
          $conexiones = new ConexionesTable();
          $rawdataQ = $conexiones->getVersionQaInfo();
           for($i=0;$i<count($rawdataQ);$i++){
            $servicio=$rawdataQ[$i][0];
            $version=$rawdataQ[$i][1];
            $user=$rawdataQ[$i][2];
            $cambios=$rawdataQ[$i][3];
            $fecha=$rawdataQ[$i][4];
      ?>
           <tr>
             <td class="td-diff fuente_min"><?php echo $servicio; ?></td>
             <td class="td-diff fuente_min"><?php echo $version; ?></td>
             <td class="td-diff fuente_min"><?php echo $user; ?></td>
             <td class="td-diff fuente_min" width="200"><?php echo $cambios; ?></td>
             <td class="td-diff fuente_min"><?php echo $fecha; ?></td>
           </tr>
      <?php
          }
      ?>
    </table>
    </br />
    </div>
    <div class="inLine">
    <table class="mostrar">
      <tr>
        <th colspan="5" class="table-diff7 fuente_min">Ambiente de Produccion</th>
      </tr>
      <tr>
        <th class="table-diff2 fuente_min">Servicio</th>
        <th class="table-diff2 fuente_min">Version</th>
        <th class="table-diff2 fuente_min">User</th>
        <th class="table-diff2 fuente_min">Cambios</th>
        <th class="td-diff2 fuente_min">Fecha</th>
      </tr>
      <?php
          $conexiones = new ConexionesTable();
          $rawdataQ = $conexiones->getVersionProdInfo();
           for($i=0;$i<count($rawdataQ);$i++){
            $servicio=$rawdataQ[$i][0];
            $version=$rawdataQ[$i][1];
            $user=$rawdataQ[$i][2];
            $cambios=$rawdataQ[$i][3];
            $fecha=$rawdataQ[$i][4];
      ?>
           <tr>
             <td class="td-diff fuente_min"><?php echo $servicio; ?></td>
             <td class="td-diff fuente_min"><?php echo $version; ?></td>
             <td class="td-diff fuente_min"><?php echo $user; ?></td>
             <td class="td-diff fuente_min" width="110"><?php echo $cambios; ?></td>
             <td class="td-diff fuente_min"><?php echo $fecha; ?></td>
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
