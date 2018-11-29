<?php include("./security/seguridad.php");?>
<html>
    <head>
        <link rel="icon" type="image/png" href="images/favicon.png">
    </head>
    <title>Pruebas de Microservicios</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <div class="centered shadow spacing">
        Pruebas de Microservicios
    </div>
    <body class="centered shadow spacing">
        <div class="inLine">
            <?php require_once("ConexionesClass.php");?>
            <table>
                <tr>
                    <th colspan="3" class="table-diff2">Links de Prueba</th>
                </tr>
                <tr>
                    <th class="table-diff2">#</th>
                    <th class="table-diff2">Service</th>
                    <th class="table-diff2">LinkTest</th>
                </tr>
                <?php
                    $conexiones = new ConexionesTable();
                    $rawdataQ = $conexiones->getUrlTests();
                    for($i=0;$i<count($rawdataQ);$i++){
                        $servicio=$rawdataQ[$i][0];
                        $url=$rawdataQ[$i][1]; 
                ?>
                <tr>
                    <td class="td-diff"><?php echo $i + 1; ?></td>
                    <td class="td-diff"><?php echo $servicio; ?></td>
                    <td class="td-diff centered"><a href="<?php echo $url;?>" target="_blank">Test</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <div class="centered boton">
                <a href="./hola.php">Volver</a>
            </div>
        </div>
    </body>
</html>