<?php
class ConexionesTable{
    public $IDr = 0 ;

    function conectarBD(){
            $server = "localhost";
            $usuario = "root";
            $pass = "";
            $BD = "metrics";

            $conexion = mysqli_connect($server, $usuario, $pass, $BD);

            if(!$conexion){
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
            }
            return $conexion;
    }

    function desconectarBD($conexion){
      $close = mysqli_close($conexion);

      if(!$close){
         echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
      }
      return $close;
    }

    function getArraySQL($sql){
      $conexion = $this->conectarBD();
      if(!$result = mysqli_query($conexion, $sql)) die();
      $rawdata = array();
      $i=0;
      while($row = mysqli_fetch_array($result)){
        $rawdata[$i] = $row;
        $i++;
      }
      $this->desconectarBD($conexion);
      return $rawdata;
    }

    function insertValues(){
        $stringconn = "host=104.198.137.0 port=5432 dbname=postgres user=postgres password='postgres'";
        $CONN = pg_connect($stringconn);

          if(!$CONN){
            echo "Ocurrió un error.\n";
            exit;
          }
          else{
          $result2 = pg_query($CONN, "SELECT count(application_name)
                                      FROM pg_stat_activity AS Total
                                      WHERE datname = 'postgres'
                                      AND client_addr = '35.202.34.90';");
          $row2 = pg_fetch_row($result2);
          }
        pg_close($CONN);

        $stringconn = "host=35.188.31.144 port=5432 dbname=postgres user=postgres password='postgres'";
        $CONN = pg_connect($stringconn);

          if(!$CONN){
            echo "Ocurrió un error.\n";
            exit;
          }
          else{
          $result3 = pg_query($CONN, "SELECT count(application_name)
                                      FROM pg_stat_activity AS Total
                                      WHERE datname = 'postgres'
                                      AND client_addr = '35.202.57.230';");
          $row3 = pg_fetch_row($result3);
          }
        pg_close($CONN);

        $conexion = $this->conectarBD();
        $sql = "insert into Con_Rec (ambiente, conexiones) values (0,".$row2[0].")";
        $consulta = mysqli_query($conexion,$sql);
        $sql = "insert into Con_Rec (ambiente, conexiones) values (1,".$row3[0].")";
        $consulta = mysqli_query($conexion,$sql);
        if(!$consulta){
            echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
        }
        $this->desconectarBD($conexion);
        return $consulta;
    }

    function insertServices($service, $description, $version, $fecha_actual, $user, $active, $server, $url, $test){
      $conexion = $this->conectarBD();
      $sql = "INSERT INTO services
                      (name, description, version, dates, last_user_id, inActive, server, url, inTest)
              VALUES ('".$service."','".$description."','".$version."','".$fecha_actual."','.$user.','".$active."','".$server."','".$url."','".$test."')";
      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }

    function insertVersion($service, $version, $fecha_actual, $user, $cambios, $ambiente){
      $conexion = $this->conectarBD();
      $sql = "INSERT INTO version_control
                      (service, version, fecha, user, description, env_id)
              VALUES (".$service.",'".$version."','".$fecha_actual."',".$user.",'".$cambios."',".$ambiente.")";
      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }

    function updateService($service, $version, $fecha_actual, $user){
      $conexion = $this->conectarBD();
      $sql = "UPDATE services
              SET version='".$version."', dates='".$fecha_actual."', last_user_id=".$user."
              WHERE id=".$service ;
      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }

    function insertUsers($nombre, $mail, $active, $username, $password){
      $conexion = $this->conectarBD();
      $sql = "INSERT INTO users (nombre, mail, active, username, password) VALUES ('".$nombre."','".$mail."',".$active.",'".$username."','".$password."')";
      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }

    function getServicesInfo(){
      $sql = "SELECT S.Name,
	                   S.description,
                     S.version,
                     S.dates,
                     U.nombre,
                     S.inActive,
                     S.server,
                     S.inTest
       FROM services S
       INNER JOIN users U
	      ON U.id_user = S.last_user_id
        ORDER BY S.id;";
      return $this->getArraySQL($sql);
    }

    function getServiceName($ide){
      $sql = "SELECT S.Name
       FROM services S ;";
      return $this->getArraySQL($sql);
    }

    function getUrlTests(){
      $sql = "SELECT S.Name, S.url
       FROM services S WHERE S.inTest = 'Si' ORDER BY S.server DESC, S.Name;";
      return $this->getArraySQL($sql);
    }

    /*Nueva Funcion*/

    function getVersionDevInfo(){
        $sql ="SELECT S.name,
                      V1.version,
                      U.nombre,
                      V1.description,
                      V1.fecha
               FROM version_control AS V1
               INNER JOIN services S
                ON S.id = V1.service
               INNER JOIN users U
               ON U.id_user = V1.`user`
               WHERE V1.id = (SELECT MAX(id)
                              FROM version_control as V2
                              WHERE V1.service = V2.service
                              AND V2.env_id = 1)
               ORDER BY V1.service;";
      return $this->getArraySQL($sql);
    }

    function getVersionQaInfo(){
        $sql ="SELECT S.name,
                      V1.version,
                      U.nombre,
                      V1.description,
                      V1.fecha
               FROM version_control AS V1
               INNER JOIN services S
                ON S.id = V1.service
               INNER JOIN users U
               ON U.id_user = V1.`user`
               WHERE V1.id = (SELECT MAX(id)
                              FROM version_control as V2
                              WHERE V1.service = V2.service
                              AND V2.env_id = 2)
               ORDER BY V1.service;";
      return $this->getArraySQL($sql);
    }

    function getVersionProdInfo(){
        $sql ="SELECT S.name,
                      V1.version,
                      U.nombre,
                      V1.description,
                      V1.fecha
               FROM version_control AS V1
               INNER JOIN services S
                ON S.id = V1.service
               INNER JOIN users U
               ON U.id_user = V1.`user`
               WHERE V1.id = (SELECT MAX(id)
                              FROM version_control as V2
                              WHERE V1.service = V2.service
                              AND V2.env_id = 3)
               ORDER BY V1.service;";
      return $this->getArraySQL($sql);
    }

    function getUsersInfo(){
      $sql = "SELECT * FROM users;";
      return $this->getArraySQL($sql);
    }

    function getAllInfoQ(){
      $sql = "SELECT * FROM Con_Rec WHERE ambiente = 0;";
        return $this->getArraySQL($sql);
    }

    function getAllInfoP(){
      $sql = "SELECT * FROM Con_Rec WHERE ambiente = 1;";
        return $this->getArraySQL($sql);
    }
    function getLastServiceId(){
      $sql = "SELECT max(id) FROM services";
        return $this->getArraySQL($sql);
    }
    function getUser($usuario, $password){
      $sql = "SELECT * FROM users WHERE username='".$usuario."' AND password='".$password."'";
        return $this->getArraySQL($sql);
    }

    function activateUser($id){
      $conexion = $this->conectarBD();
      $sql = "UPDATE users SET active = 1 WHERE id_user = ". $id .";";
      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }

    function inactivateUser($id){
      $conexion = $this->conectarBD();
      $sql = "UPDATE users SET active = 0 WHERE id_user = ". $id .";";
      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }

    function getProgress(){
      $sql="SELECT 	S.name,
		                I.port,
                    I.webserver,
                    I.CS,
                    I.ES,
                    I.SBAS,
                    I.Ribbon,
                    I.Hystrix,
                    I.HeCache,
                    I.Zuul,
                    I.Oath2
                    FROM implementation I
            INNER JOIN services S
            ON I.serviceid = S.id
            WHERE S.inActive = 'Si'
            ORDER BY I.port;";
          return $this->getArraySQL($sql);
    }

    function queryProgress($service){
      $sql = "SELECT I.id,
                     S.name
              FROM implementation I
              INNER JOIN services S
              ON S.id = I.serviceid
              WHERE S.Id = ".$service.";";
      return $this->getArraySQL($sql);
    }

    function insertProgress($service, $port, $webserver, $cs, $es, $sbas, $ribbon, $hystrix, $hecache, $zuul, $oauth){
      $conexion = $this->conectarBD();
      $sql = "INSERT INTO implementation
                          (serviceid, port, webserver, CS, ES, SBAS, Ribbon, Hystrix, HeCache, Zuul, Oath2)
                          VALUES (".$service.",".$port.",'".$webserver."','".$cs."','".$es."','".$sbas."','".$ribbon."','".$hystrix."','".$hecache."','".$zuul."','".$oauth."')";


      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }
    function updateProgress($service, $port, $webserver, $cs, $es, $sbas, $ribbon, $hystrix, $hecache, $zuul, $oauth){
      $conexion = $this->conectarBD();
        $sql = "UPDATE implementation
                   SET port=".$port.",
                       webserver='".$webserver."',
                       CS='".$cs."',
                       ES='".$es."',
                       SBAS='".$sbas."',
                       Ribbon='".$ribbon."',
                       Hystrix='".$hystrix."',
                       HeCache='".$hecache."',
                       Zuul='".$zuul."',
                       Oath2='".$oauth."'
                   WHERE serviceid=".$service.";";

      $consulta = mysqli_query($conexion,$sql);

      if(!$consulta){
          echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
      }
      $this->desconectarBD($conexion);
      return $consulta;
    }
}
?>
