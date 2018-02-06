<html>
    <head>
      <title>
        Conexiones
      </title>
      <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body class="centered">
      <div class="centered shadow spacing">Cantidad de Conexiones Recurrentes Por Ambiente</div>
      <br />
      <div class="inLine mostrar">
        <div class="centerTable">
        <?php
            require_once("ConexionesClass.php");
            $stringconn = "host=104.198.137.0 port=5432 dbname=postgres user=postgres password='postgres'";
            $CONN = pg_connect($stringconn);

            /*echo $CONN;*/

            if(!$CONN){
              echo "Ocurrió un error.\n";
              exit;
            }
            else{
              $result = pg_query($CONN,
              "SELECT
                application_name AS Servicio,
  	            count(application_name) AS Conexiones
                FROM
               	pg_stat_activity
                WHERE
                datname = 'postgres'
                AND
                client_addr = '35.202.34.90'
                GROUP BY
                application_name;");
        ?>
        <table class="table-classy">
          <tr>
            <th class="table-diff2" colspan="2">QA</th>
          </tr>
          <tr>
            <th class="table-diff2">Servicio</th>
            <th class="table-diff2">Conexiones</th>
          </tr>
        <?php
              while ($row = pg_fetch_row($result)) {
                $servicio = ucwords("$row[0]");
                $Num_QA = "$row[1]";
        ?>
          <tr>
            <td><?php echo $servicio; ?></td>
            <td><?php echo $Num_QA; ?></td>
          </tr>
        <?php
              }
            }
            $result2 = pg_query($CONN,
            "SELECT
              count(application_name)
            FROM
              pg_stat_activity AS Total
            WHERE
              datname = 'postgres'
            AND
              client_addr = '35.202.34.90';");
              $row2 = pg_fetch_row($result2)
        ?>
            <tr>
              <th class="table-diff2">Total</th>
              <th class="table-diff2"><?php echo "$row2[0]"; ?></th>
            </tr>
        <?php
            pg_close($CONN);
        ?>
        </table>
    		<br />
      </div>
      </div>
      <div class="inLine mostrar">
        <div class="centerTable">
        <?php
            $stringconn = "host=35.188.31.144 port=5432 dbname=postgres user=postgres password='postgres'";
            $CONN = pg_connect($stringconn);

            /*echo $CONN;*/

            if(!$CONN){
              echo "Ocurrió un error.\n";
              exit;
            }
            else{
              $result = pg_query($CONN,
              "SELECT
                application_name AS Servicio,
  	            count(application_name) AS Conexiones
                FROM
               	pg_stat_activity
                WHERE
                datname = 'postgres'
                AND
                client_addr = '35.202.57.230'
                GROUP BY
                application_name;");
        ?>
        <table class="table-classy">
          <tr>
            <th class="table-diff2" colspan="2">Production</th>
          </tr>
          <tr>
            <th class="table-diff2">Servicio</th>
            <th class="table-diff2">Conexiones</th>
          </tr>
        <?php
              while ($row = pg_fetch_row($result)) {
                $serviciop = ucwords("$row[0]");
                $Num_PR = "$row[1]";
        ?>
          <tr>
            <td><?php echo $serviciop; ?></td>
            <td><?php echo $Num_PR; ?></td>
          </tr>
        <?php
              }
            }
            $result2 = pg_query($CONN,
            "SELECT
              count(application_name)
            FROM
              pg_stat_activity AS Total
            WHERE
              datname = 'postgres'
            AND
              client_addr = '35.202.57.230';");
              $row2 = pg_fetch_row($result2)
        ?>
            <tr>
              <th class="table-diff2">Total</th>
              <th class="table-diff2"><?php echo "$row2[0]"; ?></th>
            </tr>
        <?php
            pg_close($CONN);
        ?>
        </table>
    		<br />
      </div>
    </div>
    <div class="centered boton">
      <a href="./conexion.php">Refrescar</a>
    </div>
    <div class="centered boton">
      <a href="./hola.php">Volver</a>
    </div>
    </body>
</html>
