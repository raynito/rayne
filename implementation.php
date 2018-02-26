<?php include("./security/seguridad.php");?>
<html>
  <head><link rel="icon" type="image/png" href="images/favicon.png" /></head>
  <title>Mantenimiento de Implementación</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <div class="centered shadow spacing">
    Mantenimiento de Implementación
  </div>
  <br />
	<body class="centered shadow spacing">
    <div class="inLine">
      <?php require_once("ConexionesClass.php");?>
      <form action="imp_conf.php" method="post">
      <table class="table-diff-black">
        <tr>
          <th colspan ="11" class="table-diff-black">Implementación</th>
        </tr>
        <tr>
          <tr>
            <th class="table-diff-black">Service</th>
            <th class="table-diff-black">Port</th>
            <th class="table-diff-black">WebServer</th>
            <th class="table-diff-black">ConfigServer</th>
            <th class="table-diff-black">EurekaServer</th>
            <th class="table-diff-black">Ribbon</th>
            <th class="table-diff-black">Hystrix</th>
            <th class="table-diff-black">SBAdminServer</th>
            <th class="table-diff-black">Zuul</th>
            <th class="table-diff-black">HeCaché</th>
            <th class="table-diff-black">OAuth2</th>
          </tr>
        <tr>
          <th class="table-diff-black">
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
          <th class="table-diff-black"><input type="text" name="port" /></th>
          <th class="table-diff-black"><input type="text" name="webserver" /></th>
          <th class="table-diff-black">
            <select name="menucs" id="menucs" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
              <option value="NA">N/A</option>
            </select>
          </th>
          <th class="table-diff-black">
            <select name="menues" id="menues" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </th>
          <th class="table-diff-black">
            <select name="menurib" id="menurib" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </th>
          <th class="table-diff-black">
            <select name="menuhy" id="menuhy" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </th>
          <th class="table-diff-black">
            <select name="menusba" id="menusba" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </th>
          <th class="table-diff-black">
            <select name="menuzu" id="menuzu" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </th>
          <th class="table-diff-black">
            <select name="menuhe" id="menuhe" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </th>
          <th class="table-diff-black">
            <select name="menuoa" id="menuoa" onChange="document.form.submit()">
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </th>
        </tr>
        <tr>
			  	<th colspan="11" class="table-diff-black">
            <input type="submit" value="Guardar"/>
          </th>
			  </tr>
      </table>
      </form>
    </div>
    <br />
    <div class="inLine">
    <table class="table-diff-black">
      <tr>
        <th class="table-diff-black">Service</th>
        <th class="table-diff-black">Port</th>
        <th class="table-diff-black">WS</th>
        <th class="table-diff-black">CS</th>
        <th class="table-diff-black">ES</th>
        <th class="table-diff-black">SBAS</th>
        <th class="table-diff-black">LB</th>
        <th class="table-diff-black">Mon</th>
        <th class="table-diff-black">Caché</th>
        <th class="table-diff-black">Rout</th>
        <th class="table-diff-black">Sec</th>
      </tr>
      <?php
          $conexiones = new ConexionesTable();
          $rawdataQ = $conexiones->getProgress();
           for($i=0;$i<count($rawdataQ);$i++){
            $service=$rawdataQ[$i][0];
            $port=$rawdataQ[$i][1];
            $webserver=$rawdataQ[$i][2];
            $cs=$rawdataQ[$i][3];
            $es=$rawdataQ[$i][4];
            $sbas=$rawdataQ[$i][5];
            $ribbon=$rawdataQ[$i][6];
            $hystrix=$rawdataQ[$i][7];
            $hechache=$rawdataQ[$i][8];
            $zuul=$rawdataQ[$i][9];
            $oauth=$rawdataQ[$i][10];
      ?>
           <tr>
             <td class="table-diff-center"><?php echo $service; ?></td>
             <td class="table-diff-black"><?php echo $port; ?></td>
             <td class="table-diff-center"><?php echo $webserver; ?></td>
             <td class="table-diff-black"><?php echo $cs; ?></td>
             <td class="table-diff-black"><?php echo $es; ?></td>
             <td class="table-diff-black"><?php echo $sbas; ?></td>
             <td class="table-diff-black"><?php echo $ribbon; ?></td>
             <td class="table-diff-black"><?php echo $hystrix; ?></td>
             <td class="table-diff-black"><?php echo $hechache; ?></td>
             <td class="table-diff-black"><?php echo $zuul; ?></td>
             <td class="table-diff-black"><?php echo $oauth; ?></td>
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
