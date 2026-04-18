<?php

class Conexion {
    
    public function getConexion(){
        
        $host = Nombre_Servidor; 
        $dbf = Nombre_BD;      //base de datos de mysql
        $user = Nombre_Usuario;       // usuario de mysql
        $password = Password;       //contraseña de mysql
        
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