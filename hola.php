<?php include("./security/seguridad.php");?>
<html>
	<head>
		<link rel="icon" type="image/png" href="images/favicon.png" />
	</head>
	<title>Tiempos de Implementacion de GCP</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<br />
	<body>
		<div class="centered p-text"> Logged as:  <?php echo $_SESSION['user']; ?></div>
		<br />
		<div class="centered shadow spacing">Tiempos de Configuración <br />
		de Ambientes (en Horas)
    </div>
		<br />
		<div class="centerTable">
			<table class="table-classy">
			  <tr>
			  	<th colspan="4" class="table-diff">Configuraciones</th>
			  </tr>
			  <tr>
			  	<th class="table-diff2">Implementación</th>
			    <th class="table-diff2">Servidor Back-End <br /> (SpringBoot)</th>
			    <th class="table-diff2">Servidor Front-End <br /> (Node)</th>
			    <th class="table-diff2">Servidor Base de datos <br /> (PostgreSQL)</th>
			  </tr>
			  <tr>
			    <td class="td-just">Creación</td>
			    <td>1,5</td>
			    <td>1,5</td>
			    <td>1,5</td>
			  </tr>
			  <tr>
			    <td class="td-just">Configuración de Parámetros</td>
			    <td>1</td>
			    <td>1</td>
			    <td>1</td>
			  </tr>
			  <tr>
			    <td class="td-just">Enrutamiento a dirección Ip Fija</td>
			    <td>0,5</td>
			    <td>0,5</td>
			    <td>0,5</td>
			  </tr>
			  <tr>
			    <td class="td-just">Carga de Datos</td>
			    <td>1</td>
			    <td>1,5</td>
			    <td>0,5</td>
			  </tr>
			  <tr>
			  	<th class="table-diff2">Total Por Servidor</th>
			    <th class="table-diff2">4</th>
			    <th class="table-diff2">4,5</th>
			    <th class="table-diff2">3,5</th>
			  </tr>
			  <tr>
			  	<th class="table-diff2">Total Implementación</th>
			    <th class="table-diff2" colspan="3">12</th>
			  </tr>
			</table>
		</div>
    <br />
		<div class="centerTable">
			<table class="table-diff3">
				<tr>
					<td class="centered boton table-diff3">
						<a href="./drawChart2.php">Graficos</a>
					</td>
					<td class="centered boton table-diff3">
						<a href="./conexion.php">Conexiones</a>
					</td>
					<td class="centered boton table-diff3">
						<a href="./servicios.php">Servicios</a>
					</td>
					<td class="centered boton table-diff3">
						<a href="./versiones.php">Versionamiento</a>
					</td>
					<td class="centered boton table-diff3">
						<a href="./usuarios.php">Usuarios</a>
					</td>
					<td class="centered boton table-diff3">
						<a href="./implementation.php">Evolución</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="centerTable">
			<table class="table-diff3">
				<tr>
					<td class="centered boton table-diff3">
						<a href="./nomenu.php">Nomina</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="centerTable">
			<table class="table-diff3">
				<tr>
					<td class="centered boton table-diff3">
						<a href="./security/salir.php">Salir</a>
					</td>
				</tr>
			</table>
		</div>
		<br />
		<br />
		<div class="righted shadow">Creado por el Ing. Rayne Flores</div>
    <div class="righted shadow fuente_min"> Version del Navegador:  <?php echo $_SERVER['HTTP_USER_AGENT']; ?></div>
	</body>
	</style>
</html>
