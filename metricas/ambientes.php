<html>
  <head><link rel="icon" type="image/png" href="images/favicon.png" /></head>
  <title>Evolucion de Ambientes</title>
  <link rel="stylesheet" type="text/css" href="styles/styles.css">
  <div class="centered shadow spacing">
    Evolucion de Ambientes
  </div>
  <br />
	<body class="centered shadow spacing">
    <div class="inLine">
      <table class="table-diff-black">
        <tr>
          <th colspan ="11" class="table-diff-black">Implementación en Ambientes</th>
        </tr>
        <tr>
          <th class="table-diff-black">Servicio</th>
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
          <td class="table-diff-black">AuthServiceApp</td>
          <td class="table-diff-black">5000</td>
          <td class="table-diff-black">Tomcat</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">SpringBootAdminServer</td>
          <td class="table-diff-black">8000</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">ConfigServer</td>
          <td class="table-diff-black">8010</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-black">N/A</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">EurekaServer</td>
          <td class="table-diff-black">8020</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Status</td>
          <td class="table-diff-black">8090</td>
          <td class="table-diff-black">Tomcat</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Services</td>
          <td class="table-diff-black">9000</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Lines</td>
          <td class="table-diff-black">9010</td>
          <td class="table-diff-black">Tomcat</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">SecurityLevels</td>
          <td class="table-diff-black">9020</td>
          <td class="table-diff-black">Tomcat</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Headers</td>
          <td class="table-diff-black">9030</td>
          <td class="table-diff-black">Tomcat</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Users</td>
          <td class="table-diff-black">9040</td>
          <td class="table-diff-black">Tomcat</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Resolutionsusers</td>
          <td class="table-diff-black">9050</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Groups</td>
          <td class="table-diff-black">9060</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">monitoringdashboard</td>
          <td class="table-diff-black">9070</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Resolutionsgroups</td>
          <td class="table-diff-black">9080</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-yes"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
        <tr>
          <td class="table-diff-black">Tickets</td>
          <td class="table-diff-black">9090</td>
          <td class="table-diff-black">UnderTow</td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
          <td class="table-diff-no"></td>
        </tr>
      </table>
    </div>
    <br />
    <div class="centered boton">
      <a href="./hola.php">Volver</a>
    </div>
  </body>
</html>
