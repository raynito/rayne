<HTML>
  <head>
    <title>
      Grafica de Conexiones por Ambiente
    </title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
  </head>
  <BODY onload="setInterval(function(){document.location.reload()},60000)">
    <meta charset="utf-8">
    <?php
      require_once("ConexionesClass.php");

      $conexiones = new ConexionesTable();
      $conexiones->insertValues();
      $rawdataQ = $conexiones->getAllInfoQ();
      $rawdataP = $conexiones->getAllInfoP();

      $valoresArray;
      $timeArray;
        for($i = 0 ;$i<count($rawdataQ);$i++){
          $valoresArray[$i]= $rawdataQ[$i][1];
          $time= $rawdataQ[$i][2];
          $date = new DateTime($time);
          $timeArray[$i] = $date->getTimestamp()*1000;
        }
      $valoresArray2;
      $timeArray2;
        for($i = 0 ;$i<count($rawdataP);$i++){
          $valoresArray2[$i]= $rawdataP[$i][1];
          $time2= $rawdataP[$i][2];
          $date2 = new DateTime($time2);
          $timeArray2[$i] = $date2->getTimestamp()*1000;
        }
    ?>
    <div class="centered shadow spacing">Graficas de Conexiones Recurrentes Por Ambiente</div>
    <br />
    <div class="mostrar" id="contenedor3"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="contenedor3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <script>
      chartCPU = new Highcharts.chart({
          chart: {
            renderTo: 'contenedor3',
            type: 'spline'
          },
          title: {
              text: 'Comparativa de Conexiones Recurrentes por Ambiente'
          },
          subtitle: {
              text: 'Source: Intelenz.com'
          },
          xAxis: {
            type: 'datetime',
              title: {
                text: 'Hora',
                margin: 10
            },
            tickPixelInterval: 150
          },
          yAxis: {
            minPadding: 0.1,
            maxPadding: 0.1,
              title: {
                text: 'Conexiones',
                margin: 10
              }
          },
          plotOptions: {
              line: {
                  dataLabels: {
                      enabled: true
                  },
                  enableMouseTracking: true
              },
              spline: {
                marker: {
                    enabled: false
                }
              }
          },
          series: [{
              name: 'QA',
              data: (function() {
                        var data = [];
                        <?php
                            for($i = 0 ;$i<count($rawdataQ);$i++){
                        ?>
                        data.push([<?php echo $timeArray[$i];?>,<?php echo $valoresArray[$i];?>]);
                        <?php } ?>
                        return data;
                    })(),
          }, {
              name: 'Production',
              data: (function() {
                          var data = [];
                          <?php
                              for($i = 0 ;$i<count($rawdataP);$i++){
                          ?>
                          data.push([<?php echo $timeArray2[$i];?>,<?php echo $valoresArray2[$i];?>]);
                          <?php } ?>
                          return data;
                    })(),
          }],
          credits: {
                    enabled: false
          }
      });
      </script>
      <div class="boton centered">
        <a href="./hola.php">Volver</a>
      </div>
  </BODY>
</HTML>
