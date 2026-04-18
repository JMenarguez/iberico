<?php

class Api
{
    
    
    public function getUsuario($email,$clave)
    {
        
        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($email!="")
        {
            $sql = "SELECT * FROM usuarios WHERE email = '$email'";

        }
        else
        {
            $sql = "SELECT * FROM usuarios";

        }

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "usuario" => $fila['usuario'],
                    "email" => $fila['email'],
                    "empresa"=> $fila['empresa'],
                    'clave'=>password_verify($clave,$fila['clave']),
                    'clave1'=>"",
                    'vendedor'=>$fila['vendedor'],
                    'nomvend'=>$fila['nomvend'],
                    'nivel'=>$fila['nivel'],
                    'activo'=>$fila['activo'],  
                    'device'=>$fila['device'],              
                );

            }

        }

        return $vector;
    }
    public function getUsuariosActivos()
    {
        
        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT COUNT(email) as activos FROM usuarios WHERE activo=1";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        
        $sql = "SELECT COUNT(email) as total FROM usuarios";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado1 = $consulta->fetchAll();
        $vtotal=$resultado1[0]['total'];
        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "activos" => $fila['activos'],
                    "total" => $vtotal,
                               
                );

            }

        }

        return $vector;
    }
   
    
    public function getImagenes($codart)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM imagenesweb WHERE codart='$codart'";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "id" => $fila['id'],
                    "codart" => $fila['codart'],
                    "uri" => $fila['uri'],);
            }

        }

        return $vector;
    }
    public function getClientes($cod,$clave)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if ($cod != '') {
            $sql = "SELECT * FROM clientes WHERE codigo = '$cod'";
        } else {
            if($clave==0){
                $sql = "SELECT * FROM clientes ORDER BY razon ";
            }else if($clave==1)
            {
                $sql = "SELECT * FROM clientes WHERE ctacte=1 ORDER BY razon ";
            }else if($clave==2)
            {
                $sql = "SELECT * FROM clientes WHERE saldo<>0 ORDER BY razon ";

            }

        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "razon" => $fila['razon'],
                    "domicilio" => $fila['domicilio'],
                    "nomloc" => $fila['nomloc'],
                    "localidad"=>$fila['localidad'],
                    "condiva" => $fila['condiva'],
                    "cuit" => $fila['cuit'],
                    "dni" => $fila['dni'],
                    "email"=> $fila['email'],
                    "telefono"=>$fila['telefono'],
                    "estado" => $fila['estado'],
                    "saldo" => $fila['saldo'],
                    "ultcompra" => $fila['ultcompra'],
                    "ultpago" => $fila['ultpago'],
                    "obs" => $fila['obs'],
                    "fantasia" => $fila['fantasia'],
                    "vendedor" => $fila['vendedor'],
                    "zona" => $fila['zona'],
                    "lista" => $fila['lista'],
                                      

                );
            }

        }

        return $vector;
    }
    public function getClientesCoords($cod)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM clientes WHERE codigo = '$cod'";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "razon" => $fila['razon'],
                    "latitud" => $fila['latitud'],
                    "longitud" => $fila['longitud'],
                );
            }
        }
        return $vector;
    }
    public function getUltimoCodigo($codigo)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT MAX(codigo) as ultimo FROM " .$codigo ;
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "ultimo" => $fila['ultimo']
                    );
            }

        }

        return $vector;
    }
    
    public function getProveed($cod)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if ($cod != '') {
            $sql = "SELECT * FROM proveed WHERE codigo = '$cod'";
        } else {
            $sql = "SELECT * FROM proveed ORDER BY razon";
        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "razon" => $fila['razon'],
                    "domicilio" => $fila['domicilio'],
                    "codloc"=>$fila['codloc'],
                    "localidad" => $fila['localidad'],
                    "condiva" => $fila['condiva'],
                    "cuit" => $fila['cuit'],
                    "email"=> $fila['email'],
                    "telefono"=>$fila['telefono'],
                    "saldo" => $fila['saldo'],
                    "saldo" => $fila['saldo'],
                    "obs" => $fila['obs'],
                );
            }

        }

        return $vector;
    }

    public function getCliSearch($cod)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "SELECT * FROM clientes WHERE razon LIKE '%$cod%' OR fantasia LIKE '%$cod%' OR cuit LIKE '$cod' OR codigo LIKE '$cod%' ";

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "razon" => $fila['razon'],
                    "domicilio" => $fila['domicilio'],
                    "localidad"=>$fila['localidad'],
                    "nomloc" => $fila['nomloc'],
                    "condiva" => $fila['condiva'],
                    "cuit" => $fila['cuit'],
                    "dni" => $fila['dni'],
                    "estado" => $fila['estado'],
                    "email"=> $fila['email'],
                    "telefono"=>$fila['telefono'],
                    "saldo" => $fila['saldo'],
                    "fantasia" => $fila['fantasia'],
                );
            }

        }

        return $vector;
    }
    public function getProvSearch($cod)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "SELECT * FROM proveed WHERE razon LIKE '%$cod%' OR cuit LIKE '%$cod%'";

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "razon" => $fila['razon'],
                    "domicilio" => $fila['domicilio'],
                    "codloc"=>$fila['codloc'],
                    "localidad" => $fila['localidad'],
                    "condiva" => $fila['condiva'],
                    "cuit" => $fila['cuit'],
                    "saldo" => $fila['saldo'],
                );
            }

        }

        return $vector;
    }

    
    public function getVendedor($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if ($cod != '') {
            $sql = "SELECT * FROM vendedor WHERE codigo = '$cod'";
        } else {
            $sql = "SELECT * FROM vendedor ORDER BY nombre";
        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            if ($cod === '') {
                $vector[] = array(
                    "codigo" => "000",
                    "nombre" => "SIN VENDEDOR");
            }
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "listas" => $fila['listas'],
                    "descmax" => $fila['descmax'],
                );

            }

        }

        return $vector;
    }
    
      
    
    public function getArticulos($cod,$clave)
    {

        $vector = array();
        $conexion = new Conexion();
        //$conexion->cerrarConexion();
        $db = $conexion->getConexion();
        if ($cod != '') {
            $sql = "SELECT a.* ,b.precio as precio , b.anterior as anterior,b.fecha as fechapre, '' as uri,c.razon as nomprov,ifnull(e.precio,0) as oferta FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart LEFT JOIN proveed c ON a.proveedor=c.codigo LEFT JOIN ofertas e ON a.codigo=e.codigo WHERE (a.codigo = '$cod' or a.barras='$cod') and b.lista='01' and a.perfil<>3";
        } else {

            $sql = "SELECT a.*,b.precio as precio,b.anterior as anterior,b.fecha as fechapre,c.uri ,d.razon as nomprov,ifnull(e.precio,0) as oferta FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart  LEFT JOIN imagenesweb c ON a.codigo=c.codart LEFT JOIN proveed d ON a.proveedor=d.codigo LEFT JOIN ofertas e ON a.codigo=e.codigo where b.lista='01' and a.codigo LIKE '$clave%'  and a.perfil<>3 ORDER BY a.nombre";
        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "barras"=>$fila['barras'],
                    "nombre" => $fila['nombre'],
                    "gravamen" => $fila['gravamen'],
                    "perfil"=>$fila['perfil'],
                    "precio"=> $fila['precio'],
                    "anterior"=>$fila["anterior"],
                    "lista"=>"01",
                    "fecha"=>$fila["fechapre"],
                    "cantidad"=>$fila["cantidad"],
                    "uri"=>$fila["uri"],
                    "proveedor"=>$fila["proveedor"],
                    "nomprov"=>$fila["nomprov"],
                    "desc"=>$fila["descu"],
                    "oferta"=>$fila["oferta"],


                );
            }

        }

        return $vector;
    }
    public function getArtSearch($cod,$clave)
    {

        
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($clave=='codigo'){
            $sql = "SELECT a.*, d.razon as nomprov,c.uri FROM articulos a LEFT JOIN proveed d ON a.proveedor=d.codigo LEFT JOIN imagenesweb c ON a.codigo=c.codart  WHERE codigo like '%$cod%' and perfil<>3";
            $consulta = $db->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            if (count($resultado) > 0) {
                foreach ($resultado as $fila) {
                    //$cod++;
                    $vector[] = array(
                        "codart" => $fila['codigo'],
                        "nombre" => $fila['nombre'],
                        "barras" => $fila['barras'],
                        "proveedor"=>$fila["proveedor"],
                        "nomprov"=>$fila["nomprov"],
                        "lista"=>"00",
                        "precio" => "0.00",
                        "fecha"=>"2021-01-01",
                        "usuario"=>"",
                        "listanom"=>"",
                        "vacio"=>"xx",                       
                        "anterior"=>"0.00",
                        "pendiente"=>"0",
                        "desc"=>$fila["descu"],
                        "uri"=>$fila["uri"],
                       
                    );
                }

            }
        }else{
            if ($clave==0)
            {
                $sql = "SELECT a.* ,b.precio as precio,IFNULL(sum(c.exis),0) as exis,d.razon as nomprov, e.uri,ifnull(f.precio,0) as oferta FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart LEFT JOIN stock c ON a.codigo=c.codart LEFT JOIN proveed d ON a.proveedor=d.codigo LEFT JOIN imagenesweb e ON a.codigo=e.codart LEFT JOIN ofertas f ON a.codigo=f.codigo WHERE (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' OR a.barras LIKE '%$cod%')  and b.lista='01' and exis>0 and a.perfil<>3  group by a.codigo order by a.nombre " ;

            }
            else 
            {

                $sql = "SELECT a.* ,b.precio as precio,IFNULL(sum(c.exis),0) as exis,d.razon as nomprov,e.uri,ifnull(f.precio,0) as oferta FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart  LEFT JOIN stock c ON a.codigo=c.codart LEFT JOIN proveed d ON a.proveedor=d.codigo LEFT JOIN imagenesweb e ON a.codigo=e.codart LEFT JOIN ofertas f ON a.codigo=f.codigo WHERE (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' OR a.barras LIKE '%$cod%')  and b.lista='01' and a.perfil<>3  group by a.codigo order by a.nombre ";
            }
            $consulta = $db->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            if (count($resultado) > 0) {
                foreach ($resultado as $fila) {
                    //$cod++;
                    $vector[] = array(
                        "codigo" => $fila['codigo'],
                        "nombre" => $fila['nombre'],
                        "barras" => $fila['barras'],
                        "proveedor"=>$fila["proveedor"],
                        "nomprov"=>$fila["nomprov"],
                        "gravamen" => $fila['gravamen'],
                        "precio" =>$fila['precio'],
                        "stock"=>$fila['exis'],
                        "pendiente"=>"0",
                        "desc"=>$fila["descu"],
                        "uri"=>$fila["uri"],
                        "oferta"=>$fila["oferta"],
                    );
                }

            }
        }
        return $vector;
    }
    public function getArtSearchPres($cod,$clave,$clave1)
    {

        
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($clave1=='false')
        {
            $sql = "SELECT a.* ,b.precio as precio,IFNULL(c.cantidad,0) as ispedidos,IFNULL(c.precio,0) as preciop2,IFNULL(c.descu,0) as descup2, ifnull(SUM(d.exis),0) as stock,ifnull(e.precio,0) as oferta  FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart  LEFT JOIN pedidos2 c ON a.codigo=c.codart and c.numcomp='$clave' LEFT JOIN stock d ON a.codigo=d.codart LEFT JOIN ofertas e ON a.codigo=e.codigo WHERE (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' or barras like '%$cod%')  and b.lista='01' and a.perfil<>3 group by a.codigo order by a.nombre";        
        }
        else
        {
            $sql = "SELECT a.* ,b.precio as precio,IFNULL(c.cantidad,0) as ispedidos,IFNULL(c.precio,0) as preciop2,IFNULL(c.descu,0) as descup2, ifnull(SUM(d.exis),0) as stock,ifnull(e.precio,0) as oferta  FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart  LEFT JOIN pedidos2 c ON a.codigo=c.codart and c.numcomp='$clave' LEFT JOIN stock d ON a.codigo=d.codart LEFT JOIN ofertas e ON a.codigo=e.codigo WHERE (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' or barras like '%$cod%')  and b.lista='01' and a.perfil<>3 and d.exis<>0 group by a.codigo order by a.nombre";        

        }    
            
            $consulta = $db->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            if (count($resultado) > 0) {
                foreach ($resultado as $fila) {
                    //$cod++;
                    $vector[] = array(
                        "codigo" => $fila['codigo'],
                        "nombre" => $fila['nombre'],
                        "barras" => $fila['barras'],
                        "gravamen" => $fila['gravamen'],
                        "precio" =>$fila['precio'],
                        "ispedidos"=>$fila['ispedidos'],
                        "stock"=>$fila['stock'],
                        "preciop2"=>$fila['preciop2'],
                        "desc"=>$fila['descu'],
                        "descup2"=>$fila['descup2'],
                        "pendiente"=>"0",
                        "cantidad"=>$fila['cantidad'],
                        "oferta"=>$fila['oferta'],
                        
                    );
                }

            }
        
        return $vector;
    }
    public function getArtSearchLimit($cod,$clave,$clave1,$clave2,$listao,$porcent)
    {
         if($listao=="")
         {
            $listao=$clave2;
         }
         $porcent=1+($porcent/100);
        $fechaHoy=date('Y-m-d'); 
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($clave1=='false')
        {
            //$sql = "SELECT a.* ,IFNULL(b.precio,0) as precio,IFNULL(c.cantidad,0) as ispedidos,IFNULL(c.precio,0) as preciop2,IFNULL(c.descu,0) as descup2, ifnull(SUM(d.exis),0) as stock FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart  LEFT JOIN pedidos2 c ON a.codigo=c.codart and c.numcomp='$clave' LEFT JOIN stock d ON a.codigo=d.codart WHERE (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%')  and b.lista='$clave2' and a.perfil<>3 group by a.codigo order by a.nombre limit 100";
            $sql = "SELECT a.* ,IFNULL(b.precio*'$porcent',0) as precio,IFNULL(c.cantidad,0) as ispedidos,IFNULL(c.precio,0) as preciop2,IFNULL(c.descu,0) as descup2, ifnull(SUM(d.exis),0) as stock,ifnull(e.precio,0) as oferta FROM articulos a LEFT JOIN precios b ON a.codigo+'$listao'=b.codart+b.lista and b.lista='$listao'  LEFT JOIN pedidos2 c ON a.codigo=c.codart and c.numcomp='$clave' LEFT JOIN stock d ON a.codigo=d.codart LEFT JOIN ofertas e ON a.codigo=e.codigo WHERE (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' OR a.barras LIKE '%$cod%')   and a.perfil<>3  group by a.codigo order by a.nombre limit 200";
            
        }else
        {
            $sql = "SELECT a.* ,IFNULL(b.precio*'$porcent',0) as precio,IFNULL(c.cantidad,0) as ispedidos,IFNULL(c.precio,0) as preciop2,IFNULL(c.descu,0) as descup2, ifnull(SUM(d.exis),0) as stock ,ifnull(e.precio,0) as oferta FROM articulos a LEFT JOIN precios b ON a.codigo+'$listao'=b.codart+b.lista and b.lista='$listao' LEFT JOIN pedidos2 c ON a.codigo=c.codart and c.numcomp='$clave' LEFT JOIN stock d ON a.codigo=d.codart LEFT JOIN ofertas e ON a.codigo=e.codigo WHERE (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' OR a.barras LIKE '%$cod%')   and a.perfil<>3 and d.exis>0 group by a.codigo order by a.nombre limit 200";

        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "barras" => $fila['barras'],
                    "gravamen" => $fila['gravamen'],
                    "precio" =>$fila['precio'],
                    "stock"=>$fila['stock'],
                    "ispedidos"=>$fila['ispedidos'],
                    "preciop2"=>$fila['preciop2'],
                    "desc"=>$fila['descu'],
                    "descup2"=>$fila['descup2'],
                    "pendiente"=>"0",
                    "cantidad"=>$fila['cantidad'],
                    "oferta"=>$fila['oferta'],
                  

                );
            }

        }
    
        return $vector;
    }
    
    public function getIVA($codgrav)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT a.*,b.coefic FROM gravamen a  LEFT JOIN impuesto b ON a.imp1=b.codigo where a.codigo='$codgrav'";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "coefic" => $fila['coefic'],
                );

            }

        }

        return $vector;
    }
    public function getRubros()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM rubros order by nombre";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre']);

            }

        }

        return $vector;
    }
    public function getRubSearch($cod,$clave)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($clave=='codigo'){
            $sql = "SELECT * FROM rubros WHERE codigo='$cod'";
            $consulta = $db->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            if (count($resultado) > 0) {
                foreach ($resultado as $fila) {
                    //$cod++;
                    $vector[] = array(
                        "codigo" => $fila['codigo'],
                        "nombre" => $fila['nombre'],
                   );
                }

            }
        }else{
            $sql = "SELECT a.*  FROM rubros a  WHERE a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' order by a.nombre";
            $consulta = $db->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            if (count($resultado) > 0) {
                foreach ($resultado as $fila) {
                    //$cod++;
                    $vector[] = array(
                        "codigo" => $fila['codigo'],
                        "nombre" => $fila['nombre'],
                    );
                }

            }
        }
        return $vector;
    }
    public function getListas($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($cod=="")
            $sql = "SELECT * FROM listas ";
        else
           $sql = "SELECT * FROM listas where codigo='$cod'";

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "lista" => $fila['lista'],
                    "porcentaje" => $fila['porcentaje'],
                );

            }

        }

        return $vector;
    }
    public function getListasVend($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM listas ".$cod;
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "lista" => $fila['lista'],
                    "porcentaje" => $fila['porcentaje'],
                );

            }

        }

        return $vector;
    }
   
    public function getStockSearch($aartic)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "SELECT stock.*,sucursal.nombre as nomsucur FROM stock,sucursal WHERE codart='$aartic' and stock.sucursal=sucursal.codigo";

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codart" => $fila['codart'],
                    "sucursal" => $fila['sucursal'],
                    "nomsucur"=>$fila['nomsucur'],
                    "stock" => $fila['exis']);
            }

        }

        return $vector;
    }
    public function getVentasArt($codigo)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "SELECT pedidos2.fecha,pedidos2.codart,pedidos2.cantidad,pedidos1.razon FROM pedidos2,pedidos1 WHERE pedidos2.codart='$codigo' and pedidos2.numcomp=pedidos1.numero order by pedidos2.numcomp desc";

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codart" => $fila['codart'],
                    "razon" => $fila['razon'],
                    "fecha"=>$fila['fecha'],
                    "cantidad" => $fila['cantidad'],
                );
            }

        }


        return $vector;
    }
    public function getComprasArt($codigo)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        $sql = "SELECT moviart.fecha,moviart.codart,moviart.cantidad,movidia.razon FROM moviart,movidia WHERE moviart.codart='$codigo' and moviart.numcomp=movidia.numero order by moviart.numcomp desc";

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codart" => $fila['codart'],
                    "razon" => $fila['razon'],
                    "fecha"=>$fila['fecha'],
                    "cantidad" => $fila['cantidad'],
                );
            }

        }


        return $vector;
    }
    public function getPreciosSearch($aartic,$lista)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        if($aartic<>""){
            $sql="SELECT a.*,b.precio AS publico,b.anterior,b.fecha,b.usuario,b.lista,ifnull(SUM(c.exis),0) as stock FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart LEFT JOIN stock c ON a.codigo=c.codart ";
            $sql.="WHERE (a.nombre like '%$aartic%' or a.codigo LIKE '%$aartic%') and b.lista='$lista' ORDER BY a.nombre LIMIT 30";
        }else{
            $sql="SELECT a.*,b.precio AS publico,b.anterior,b.fecha,b.usuario,b.lista, 0 as stock FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart ";
            $sql.="WHERE b.lista='$lista' ORDER BY a.nombre LIMIT 30";
        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            $cod='';
            foreach ($resultado as $fila) {
                if($fila['codigo']!=$cod){
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "lista"=>$fila['lista'],
                    "precio" => $fila['publico'],
                    "fecha" => $fila['fecha'],
                    "usuario" => $fila['usuario'],
                    "listanom"=>"",
                    "vacio"=>$fila['codigo'],
                    "anterior"=>$fila['anterior'],
                    "stock"=>$fila['stock'],
                    "oferta"=>0,
                    
                    );
                    $cod=$fila['codigo'];
                }
            }

        }

        return $vector;
    }
    public function getPreciosCodLis($aartic,$lista)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
         $sql="SELECT a.*,b.precio AS publico,b.anterior,b.fecha,b.usuario,b.lista FROM articulos a LEFT JOIN precios b ON a.codigo=b.codart ";
         $sql.="WHERE a.codigo='$aartic' and b.lista='$lista'";
         $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "lista"=>$fila['lista'],
                    "precio" => $fila['publico'],
                    "fecha" => $fila['fecha'],
                    "usuario" => $fila['usuario'],
                    "anterior"=>$fila['anterior']);
                
                }
            }

        

        return $vector;
    }
    
      
    
    public function getBancos()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM bancos ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "banco" => $fila['banco'],
                    "saldo"=> $fila['saldo']);

            }

        }

        return $vector;
    }
    public function getMoviBancos($cod,$limite)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM moviban WHERE cuenta='$cod' ORDER BY fecha DESC limit $limite";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $conta=0;
        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                $conta++;
                $vector[] = array(
                    "regis"=>strval($conta),
                    "cuenta" => $fila['cuenta'],
                    "fecha" => $fila['fecha'],
                    "oper"=>$fila['oper'],
                    "numero"=> $fila['numero'],
                    "refer"=> $fila['refer'],
                    "total"=> $fila['total']);

            }

        }

        return $vector;
    }
    public function getSucursal()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM sucursal ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "turnos"=> $fila['turnos']);

            }

        }

        return $vector;
    } 
    public function getLocalid()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM localid ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "prov"=> $fila['prov']);

            }

        }

        return $vector;
    } 
    public function getMoviCajas($cod,$limite)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM cierres WHERE sucursal='$cod' ORDER BY fecha DESC limit $limite";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $conta=0;
        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                $conta++;
                $vector[] = array(
                    "regis"=>strval($conta),
                    "puesto" => $fila['puesto'],
                    "fecha" => $fila['fecha'],
                    "turno" =>$fila['turno'],
                    "total" => $fila['total'],
                    "pago1" => $fila['pago1'],
                    "pago2" => $fila['pago2'],
                    "pago3"=> $fila['pago3'],
                    "pago4"=> $fila['pago4'],
                    "pago5"=> $fila['pago5']+$fila['pago6']
                    
                );

            }

        }

        return $vector;
    }   
    public function getMoviCajasFiltro($cod,$fecha1,$fecha2,$puestos)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($puestos<>""){
            $sql = "SELECT * FROM cierres WHERE sucursal='$cod' and fecha between '$fecha1' and '$fecha2' AND  puesto='$puestos' ORDER BY fecha DESC ";
        }
        else
        {
            $sql = "SELECT * FROM cierres WHERE sucursal='$cod' and fecha between '$fecha1' and '$fecha2'  ORDER BY fecha,puesto DESC ";

        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $conta=0;
        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                $conta++;
                $vector[] = array(
                    "regis"=>strval($conta),
                    "puesto" => $fila['puesto'],
                    "fecha" => $fila['fecha'],
                    "turno" =>$fila['turno'],
                    "total" => $fila['total'],
                    "pago1" => $fila['pago1'],
                    "pago2" => $fila['pago2'],
                    "pago3"=> $fila['pago3'],
                    "pago4"=> $fila['pago4'],
                    "pago5"=> $fila['pago5']+$fila['pago6']
                );

            }

        }

        return $vector;
    }   
    public function searchCaja($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT cierres.*,puestos.nombre FROM cierres LEFT JOIN puestos ON cierres.puesto=puestos.codigo WHERE concat(cierres.puesto,cierres.fecha,cierres.turno)='$cod'" ;
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $conta=0;
        $indice="";
        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                $conta++;
                $vector[] = array(
                    "regis"=>strval($conta),
                    "puesto" => $fila['puesto'],
                    "fecha" => $fila['fecha'],
                    "turno" =>$fila['turno'],
                    "total" => $fila['total'],
                    "pago1" => $fila['pago1'],
                    "pago2" => $fila['pago2'],
                    "pago3"=> $fila['pago3'],
                    "pago4"=> $fila['pago4'],
                    "pago5"=> $fila['pago5']+$fila['pago6'],
                    "diferencia"=> $fila['diferencia'],
                    "eftencaja"=> $fila['eftencaja'],
                    "retirado"=> $fila['retirado'],
                    "indice"=> $fila['puesto'].$fila['fecha'].$fila['turno'],
                    "nombre"=> $fila['nombre']);

            }

        }

        return $vector;
    }   
    

    public function getPedidos1($cod,$clave)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($cod=='pr')
        {
            $sql = "SELECT pedidos1.*,vendedor.nombre as nomvend FROM pedidos1 LEFT JOIN vendedor ON vendedor.codigo=pedidos1.vendedor WHERE cerrado=1 and vendedor='$clave' and oper='PR'";
        }
        else
        {
            if($cod=='todos')
            {
                $sql = "SELECT pedidos1.*,vendedor.nombre as nomvend FROM pedidos1 LEFT JOIN vendedor ON vendedor.codigo=pedidos1.vendedor WHERE cerrado=0 and vendedor='$clave'";
            }
            else
            {
                if($cod==''){
                    $sql = "SELECT pedidos1.*,vendedor.nombre as nomvend FROM pedidos1 LEFT JOIN vendedor ON vendedor.codigo=pedidos1.vendedor WHERE numero='$clave' ";
                } else{
                    $sql = "SELECT pedidos1.*,vendedor.nombre as nomvend FROM pedidos1 LEFT JOIN vendedor ON vendedor.codigo=pedidos1.vendedor WHERE codcli='$cod' and cerrado=0 and vendedor='$clave' order by numero desc";
                }
            }
        }
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "fecha" => $fila['fecha'],
                    "numero" => $fila['numero'],
                    "codemi" => $fila['codemi'],
                    "puesto" => $fila['puesto'],
                    "codcli" => $fila['codcli'],
                    "razon" =>$fila['razon'],
                    "total" =>$fila['total'],
                    "items" =>$fila['items'],
                    "vendedor" =>$fila['vendedor'],
                    "nomvend" =>$fila['nomvend'],
                    "fechafac"=>$fila['fechafac'],
                    "fpago"=>$fila['fpago'],
                    "lista"=>$fila['lista'],
                    "oper"=>$fila['oper'],

                );

            }

        }
        return $vector;
    }
    public function getPedidos1UltimosCli($cod,$clave)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        
        $sql = "SELECT pedidos1.*,vendedor.nombre as nomvend FROM pedidos1 LEFT JOIN vendedor ON vendedor.codigo=pedidos1.vendedor WHERE codcli='$cod' and cerrado=1 and oper='PD' order by numero desc limit 10";
        
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "fecha" => $fila['fecha'],
                    "numero" => $fila['numero'],
                    "codemi" => $fila['codemi'],
                    "puesto" => $fila['puesto'],
                    "codcli" => $fila['codcli'],
                    "razon" =>$fila['razon'],
                    "total" =>$fila['total'],
                    "items" =>$fila['items'],
                    "vendedor" =>$fila['vendedor'],
                    "nomvend" =>$fila['nomvend'],
                    "fechafac"=>$fila['fechafac'],
                    "fpago"=>$fila['fpago'],
                    "lista"=>$fila['lista'],
                    "oper"=>$fila['oper'],
                    
                );

            }

        }
        return $vector;
    }
    public function getPedidos1Ultimo()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT MAX(numero) AS numero FROM pedidos1";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "numero" => $fila['numero'],
                );

            }

        }
        
        return $vector;
    }
    public function getPedidoBorrado($numero)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * from cambios WHERE CAMPO1='borrar' and valor1='$numero'";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        return count($resultado);
    }

   
    public function getPedidos2($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT pedidos2.*,articulos.nombre FROM pedidos2 LEFT JOIN articulos ON pedidos2.codart=articulos.codigo WHERE numcomp='$cod' ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "fecha" => $fila['fecha'],
                    "numcomp" => $fila['numcomp'],
                    "puesto"=> $fila['puesto'],
                    "codart"=> $fila['codart'],
                    "cantidad"=> $fila['cantidad'],
                    "precio"=> $fila['precio'],
                    "nombre"=> $fila['nombre'],
                    "tasa"=> $fila['tasa'],
                    "descu"=> $fila['descu'],
                );

            }

        }

        return $vector;
    } 
    public function getPedidos1Total($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT sum(pedidos2.cantidad*pedidos2.precio) as total , count(numcomp) as items  FROM pedidos2  WHERE numcomp='$cod' ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "total" => $fila['total'],
                    "items" => $fila['items'],
                );

            }

        }

        return $vector;
    } 
    public function getPedidos2Cantidad($cod,$clave)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT *  FROM pedidos2  WHERE numcomp='$clave' and codart='$cod' ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "cantidad" => $fila['cantidad'],
                );

            }

        }

        return $vector;
    } 
    public function getMoviCta($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM movicc WHERE codcli='$cod' and saldo<>0 ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "fecha" => $fila['fecha'],
                    "numero" => $fila['numero'],
                    "tipo"=> $fila['tipo'],
                    "oper"=> $fila['oper'],
                    "codemi"=> $fila['codemi'],
                    "total"=> $fila['total'],
                    "saldo"=> $fila['saldo'],);

            }

        }

        return $vector;
    } 
    public function getStockPend()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT codart,SUM(CANTIDAD) as cantidad FROM pedidos2 WHERE cerrado=1 and Remito=0 and oper='PD' group by codart";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codart" => $fila['codart'],
                    "cantidad" => $fila['cantidad'],
                    );

            }

        }

        return $vector;
    } 
    public function getStockPendCli($codart)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT codcli,clientes.razon as razon,SUM(CANTIDAD) as cantidad FROM pedidos2,clientes WHERE cerrado=1 and Remito=0 and codart='$codart' and codcli=clientes.codigo group by codcli";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "cantidad" => $fila['cantidad'],
                    "codcli" => $fila['codcli'],
                    "razon" => $fila['razon'],

                    );

            }

        }

        return $vector;
    } 
    public function getVendedorUbica($cod,$clave,$clave1)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($clave!="")
            $sql = "SELECT *  FROM visitas WHERE vendedor='$cod' and cliente='$clave' and fecha='$clave1' and (activo=2 or activo=3) and pedido=0";
        else
            $sql = "SELECT *  FROM visitas WHERE vendedor='$cod' and activo=1";

        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "fecha" => $fila['fecha'],
                    "hora" => $fila['hora'],
                    "cliente" => $fila['cliente'],
                    "razon" => $fila['razon'],
                    "latitud" => $fila['latitud'],
                    "longitud" => $fila['longitud'],
                    
                    );

            }

        }

        return $vector;
    } 
    public function getOfertas($cod,$clave)
    {

        $vector = array();
        $current_date=date('Y-m-d');
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($cod=='')
        {
            $sql="SELECT a.*,b.precio as oferta,b.fechafin,b.fecha as fechaoff,c.razon as nomprov, d.precio as precio,d.fecha as fechapre,d.anterior,d.usuario ,e.uri from articulos a right join ofertas b on a.codigo=b.codigo left join proveed c on a.proveedor=c.codigo left join precios d on a.codigo=d.codart LEFT JOIN imagenesweb e ON a.codigo=e.codart where d.lista='01' order by nombre";
        }
        else    
        {
            $sql="SELECT a.*,b.precio as oferta,b.fechafin,b.fecha as fechaoff,c.razon as nomprov, d.precio as precio,d.fecha as fechapre,d.anterior,d.usuario ,e.uri from articulos a right join ofertas b on a.codigo=b.codigo left join proveed c on a.proveedor=c.codigo left join precios d on a.codigo=d.codart LEFT JOIN imagenesweb e ON a.codigo=e.codart where (a.nombre LIKE '%$cod%' OR a.codigo LIKE '%$cod%' OR a.barras LIKE '%$cod%') AND d.lista='01' order by nombre";
        }
       
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "fecha" => $fila['fechaoff'],
                    "fechapre" => $fila['fechapre'],
                    "codigo" => $fila['codigo'],
                    "fechafin" => $fila['fechafin'],
                    "precio" => $fila['precio'],
                    "anterior" => $fila['anterior'],
                    "usuario" => $fila['usuario'],
                    "oferta" => $fila['oferta'],
                    "nombre"=>$fila["nombre"],
                    "barras"=>$fila["barras"],
                    "uri"=>$fila["uri"],
                    "nomprov"=>$fila["nomprov"],
                    );
            }
        }

        return $vector;
    } 
    public function getOfertasUna($cod)
    {

        $vector = array();
        $current_date=date('Y-m-d');
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT ofertas.*  FROM ofertas WHERE codigo='$cod' and '$current_date'<=fechafin ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "fecha" => $fila['fecha'],
                    "codigo" => $fila['codigo'],
                    "fechafin" => $fila['fechafin'],
                    "precio" => $fila['precio'],
                    "descrip"=>$fila["descrip"],
                    );
            }
        }

        return $vector;
    } 

}
