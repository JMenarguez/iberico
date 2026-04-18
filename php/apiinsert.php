<?php

class ApiInsert
{
    public function addUsuario($email, $clave, $usuario,$empresa,$vendedor,$nomvend)
    {
        $clave=password_hash($clave,PASSWORD_DEFAULT);
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO usuarios ( email, clave, usuario, empresa,vendedor,nomvend) VALUES (:email, :clave, :usuario, :empresa,:vendedor,:nomvend)  ";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':clave', $clave);
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':empresa', $empresa);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':nomvend', $nomvend);
        $consulta->execute();

        return '{"msg":"Usuario creado"}';
    }   
    
    public function addParamJson($liscos, $lispre,$lrubro,$maskcanti)
    {
        $datos = array(
            "liscos" => $liscos,
            "lispre" => $lispre,
            "lrubro" => $lrubro,
            "maskcanti" => $maskcanti
            );
        $target_path="../config/";
        $fileName='param.json';
        $target_path=$target_path.$fileName;
        $json_datos = json_encode($datos);
        if (json_last_error() === JSON_ERROR_NONE) {
            file_put_contents($target_path, $json_datos);
            return '{msg:"Param json"}'. json_last_error_msg();
            } else {
            return "Error al convertir a JSON: " . json_last_error_msg();
            }
        
        
    }   

    public function addCliente($codigo, $razon, $domicilio,$nomloc, $localidad,$condiva, $cuit, $email,$telefono,$estado,$dni,$fantasia,$vendedor,$zona)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO clientes (codigo, razon, domicilio,nomloc,localidad,condiva,cuit,email,telefono,estado,dni,fantasia,vendedor,zona) VALUES (:codigo, :razon, :domicilio,:nomloc,:localidad,:condiva,:cuit,:email,:telefono,:estado,:dni,:fantasia,:vendedor,:zona)";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':razon', $razon);
        $consulta->bindParam(':domicilio', $domicilio);
        $consulta->bindParam(':nomloc', $nomloc);
        $consulta->bindParam(':localidad', $localidad);
        $consulta->bindParam(':condiva', $condiva);
        $consulta->bindParam(':cuit', $cuit);
        $consulta->bindParam(':dni', $dni);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':estado', $estado);
        $consulta->bindParam(':fantasia', $fantasia);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':zona', $zona);
        $consulta->execute();

        return '{msg:"Cliente agregado"}';
    }
    public function addPrecio($codart, $precio, $lista,$fecha)
    {
        
        $conexion = new ConexionWeb();
        $db = $conexion->getConexionWeb();
        $sql = "INSERT INTO precios ( codart, codsec,lista, precio, usuario, fecha, anterior) VALUES (:codart,' ', :lista, :precio, 'JOSE',:fecha,'0.00')  ";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codart', $codart);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':lista', $lista);
        $consulta->bindParam(':fecha', $fecha);
        
        $consulta->execute();

        return '{"msg":"Precio creado","codigo":'.$codart.$lista.'}';
    }
    public function addPedidos1($oper,$fecha,$codemi,$numero,$puesto,$codcli,$razon,$codiva,$cuit,$dni,$vendedor,$nomvend,$fpago,$lista)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO pedidos1 (fecha, oper,codemi,numero,puesto,codcli,razon,codiva,cuit,dni,total,items,vendedor,nomvend,fpago,lista) VALUES (:fecha,:oper,:codemi, :numero, :puesto,:codcli,:razon,:codiva,:cuit,:dni,0,0,:vendedor,:nomvend,:fpago,:lista)  ";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':fecha', $fecha);
        $consulta->bindParam(':codemi', $codemi);
        $consulta->bindParam(':numero', $numero);
        $consulta->bindParam(':puesto', $puesto);
        $consulta->bindParam(':codcli', $codcli);
        $consulta->bindParam(':razon', $razon);
        $consulta->bindParam(':codiva', $codiva);
        $consulta->bindParam(':cuit', $cuit);
        $consulta->bindParam(':dni', $dni);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':nomvend', $nomvend);
        $consulta->bindParam(':fpago', $fpago);
        $consulta->bindParam(':lista', $lista);
        $consulta->bindParam(':oper', $oper);
        
        
                
        $consulta->execute();

        return '{"msg":"Presupuesto creado"}';
    }
    public function addPedidos2($oper,$fecha,$codemi,$numcomp,$puesto,$codart,$cantidad,$precio,$tasa,$descu,$codcli)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO pedidos2 ( fecha,oper, codemi,numcomp,puesto,codart,cantidad,precio,tasa,descu,codcli) VALUES (:fecha,:oper, :codemi,:numcomp, :puesto,:codart,:cantidad,:precio,:tasa,:descu,:codcli)";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':fecha', $fecha);
        $consulta->bindParam(':numcomp', $numcomp);
        $consulta->bindParam(':codemi', $codemi);
        $consulta->bindParam(':puesto', $puesto);
        $consulta->bindParam(':codart', $codart);
        $consulta->bindParam(':cantidad',$cantidad);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':tasa', $tasa);
        $consulta->bindParam(':descu', $descu);
        $consulta->bindParam(':codcli', $codcli);
        $consulta->bindParam(':oper', $oper);
                
        $consulta->execute();

        return '{"msg":"Articulo agregado"}';

    }
    public function addImagen($codart, $uri)
    {
        
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO imagenesweb (codart,uri) VALUES (:codart, :uri)";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codart', $codart);
        $consulta->bindParam(':uri', $uri);
        $consulta->execute();

        return '{"msg":"Imagen guardada"}';
    }   
    public function addCambios($tabla, $campo1,$valor1,$codigo,$campo2,$valor2)
    {
        
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO cambios (tabla,campo1,valor1,codigo,campo2,valor2) VALUES (:tabla, :campo1,:valor1,:codigo,:campo2,:valor2)";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':tabla', $tabla);
        $consulta->bindParam(':campo1', $campo1);
        $consulta->bindParam(':valor1', $valor1);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':campo2', $campo2);
        $consulta->bindParam(':valor2', $valor2);
        $consulta->execute();

        return '{"msg":"Cambios guardados"}';
    }   
    public function addVisitas($fecha,$hora,$cliente,$razon,$vendedor,$nomvend,$activo,$latitud,$longitud,$onSite)
    {
        
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO visitas (fecha,hora,cliente,razon,vendedor,nomvend,activo,latitud,longitud,onsite,fpago) VALUES (:fecha,:hora,:cliente,:razon,:vendedor,:nomvend,:activo,:latitud,:longitud,:onSite,'CO')";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':fecha', $fecha);
        $consulta->bindParam(':hora', $hora);
        $consulta->bindParam(':cliente', $cliente);
        $consulta->bindParam(':razon', $razon);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':nomvend', $nomvend);
        $consulta->bindParam(':activo', $activo);
        $consulta->bindParam(':latitud', $latitud);
        $consulta->bindParam(':longitud', $longitud);
        $consulta->bindParam(':onSite', $onSite);
       
        $consulta->execute();

        return '{"msg":"Cambios guardados"}';
    }   
    

}