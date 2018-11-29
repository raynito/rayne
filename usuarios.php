<?php include("./security/seguridad.php");?>
<html>
  <head>
      <link rel="icon" type="image/png" href="images/favicon.png" />
  </head>
  <title>Mantenimiento de Usuarios</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <!--script type="text/javascript">
        function miFuncion() {
          <?php 
            /*$conexiones = new ConexionesTable();
            $user=$_POST['user'];
            $conexiones->inactivateUser($id);*/
          ?>
        }
      </script-->
  <div class="centered shadow spacing">
    Mantenimiento de Usuarios
  </div>
  <br />
	<body class="centered shadow spacing">
    <div class="inLine">
      <?php require_once("ConexionesClass.php");?>
      <form action="userManage.php" method="post">
      <table>
        <tr>
          <th colspan ="2" class="table-diff2">Administracion</th>
        </tr>
        <tr>
          <th class="table-diff2">Nombre</th>
          <th class="table-diff2">Correo</th>
        </tr>
        <tr>
          <th class="table-diff2"><input type="text" name="nombre" /></th>
          <th class="table-diff2"><input type="text" name="mail" /></th>
        </tr>
        <tr>
			  	<th colspan="2" class="table-diff">
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
        <th class="table-diff2">Id</th>
        <th class="table-diff2">Usuario</th>
        <th class="table-diff2">Nombre</th>
        <th class="table-diff2">e-Mail</th>
        <th class="table-diff23">Status</th>
      </tr>
      <?php
          $conexiones = new ConexionesTable();
          $rawdataQ = $conexiones->getUsersInfo();
           for($i=0;$i<count($rawdataQ);$i++){
            $id=$rawdataQ[$i][0];
            $nombre=$rawdataQ[$i][1];
            $mail=$rawdataQ[$i][2];
            $username=$rawdataQ[$i][4];
            $activo=$rawdataQ[$i][5];
      ?>
           <tr>
             <td><?php echo $id; ?></td>
             <td><?php echo $username; ?></td>
             <td><?php echo $nombre; ?></td>
             <td><?php echo $mail; ?></td>
             <td><?php
              /*echo $activo;*/
                    if($activo == True){
                      ?>
                    <input 
                      type="button" 
                      name="miboton"
                      id="boton<?php echo $id?>"
                      value="Inactivar" onclick="miFuncion()" />
                      <?php
                    }else{
                    ?>
                      
                  <?php
                    }
                  ?>
            </td>
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
