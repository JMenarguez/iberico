<?php

class ConexionWeb {
	
 public function getConexionWeb(){
   $host = 'remotemysql.com:3306'; 
   $dbf = "ETpBMegBVG";      //base de datos de mysql
   $user = "ETpBMegBVG";       // usuario de mysql
   $password = "mcEZtl51Cs";       //contraseña de mysql

//conexion a la base datos utilizando pdo
try{
 $db = new PDO("mysql:host=$host;dbname=$dbf;", $user, $password);
} catch (PDOException $ex) {
  print "Error:".$ex->getMessage();
}
  return $db;
}

}

?>