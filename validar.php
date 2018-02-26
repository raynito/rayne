<?php
require_once("ConexionesClass.php");
$conexiones = new ConexionesTable;

$usuario=$_POST['user'];
$password=$_POST['password'];

/*Validacion de Campos Vacíos*/
if (empty($usuario) || empty($password)) {
  header("Location: ./html/login.html");
  exit();
}

$rawdataQ = $conexiones->getUser($usuario, $password);
  if (!count($rawdataQ)==0) {
    for($i=0;$i<count($rawdataQ);$i++) {
      session_start();
      $_SESSION["autentica"] = "SIP";
      $_SESSION['user'] = $rawdataQ[$i][1];
    }
    header("Location: hola.php");
  } else {
      header("Location: ./html/login.html");
    exit();
  }
  ?>
