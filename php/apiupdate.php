<?php

class ApiUpdate
{
    public function updateParam($liscos, $lispre,$lrubro,$maskcanti,$cheqbak)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE param SET liscos=:liscos,lispre=:lispre,lrubro=:lrubro,maskcanti=:maskcanti,cheqbak=:cheqbak";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':liscos', $liscos);
        $consulta->bindParam(':lispre', $lispre);
        $consulta->bindParam(':lrubro', $lrubro);
        $consulta->bindParam(':maskcanti', $maskcanti);
        $consulta->bindParam(':cheqbak', $cheqbak);
        $consulta->execute();

        return '{msg:"Parametros actualizados"}';
    }
    public function updateUsuario($email, $clave, $usuario,$empresa,$vendedor,$nomvend,$nivel)
    {
        
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if($clave==""){

            $sql = "UPDATE usuarios SET email=:email, usuario=:usuario, empresa=:empresa,vendedor=:vendedor,nomvend=:nomvend,nivel=:nivel WHERE email=:email";
        }
        else
        {
            $clave=password_hash($clave,PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET email=:email, clave=:clave, usuario=:usuario, empresa=:empresa,vendedor=:vendedor,nomvend=:nomvend,nivel=:nivel WHERE email=:email";
        }
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':clave', $clave);
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':empresa', $empresa);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':nomvend', $nomvend);
        $consulta->bindParam(':nivel', $nivel);
        $consulta->execute();

        return '{"msg":"Usuario Actualizado"}';
    }   
    public function updateUsuarioEstado($email, $activo,$device)
    {
        
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE usuarios SET activo=:activo, device=:device WHERE email=:email";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':activo', $activo);
        $consulta->bindParam(':device', $device);
        $consulta->execute();

        return '{"msg":"Usuario Actualizado"}';
    }   
    
    public function updateCliente($codigo, $razon, $domicilio, $nomloc,$localidad, $condiva, $cuit, $email,$telefono,$estado,$dni,$fantasia,$vendedor,$zona)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE clientes SET razon=:razon, domicilio=:domicilio,nomloc=:nomloc,localidad=:localidad,condiva=:condiva,cuit=:cuit,email=:email,telefono=:telefono,estado=:estado,dni=:dni,fantasia=:fantasia,vendedor=:vendedor,zona=:zona WHERE codigo=:codigo";
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

        return '{msg:"Cliente actualizado"}';
    }
    public function updateClienteCoor($codigo, $latitud, $longitud)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE clientes SET latitud=:latitud, longitud=:longitud WHERE codigo=:codigo";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':latitud', $latitud);
        $consulta->bindParam(':longitud', $longitud);
        $consulta->execute();

        return '{msg:"Coordenadas actualizadas"}';
    }
    public function updateProveed($codigo, $razon, $domicilio, $condiva, $cuit, $email,$telefono,$codloc,$localidad)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE proveed SET razon=:razon, domicilio=:domicilio,condiva=:condiva,cuit=:cuit,email=:email,telefono=:telefono,codloc=:codloc,localidad=:localidad WHERE codigo=:codigo";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':razon', $razon);
        $consulta->bindParam(':domicilio', $domicilio);
        $consulta->bindParam(':condiva', $condiva);
        $consulta->bindParam(':cuit', $cuit);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':telefono', $telefono);
        $consulta->bindParam(':codloc', $codloc);
        $consulta->bindParam(':localidad', $localidad);
        $consulta->execute();

        return '{msg:"Proveedor actualizado"}';
    }
    public function updateArticulo($codigo, $nombre, $gravamen,$barras,$proveedor)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE articulos SET nombre=:nombre, gravamen=:gravamen,barras=:barras,proveedor=:proveedor WHERE codigo=:codigo";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':gravamen', $gravamen);
        $consulta->bindParam(':barras', $barras);
        $consulta->bindParam(':proveedor', $proveedor);
        $consulta->execute();

        return '{msg:"Articulo actualizado"}';
    }
    public function updateBarras($codigo, $barras)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE articulos SET barras=:barras WHERE codigo=:codigo";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':barras', $barras);
        $consulta->execute();

        return '{msg:"Barras actualizadas"}';
    }
    public function updatePrecio($codigo, $lista,$precio,$fecha,$anterior)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE precios SET precio=:precio,fecha=:fecha,anterior=:anterior WHERE codart=:codigo AND lista=:lista";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':lista', $lista);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':fecha', $fecha);
        $consulta->bindParam(':anterior', $anterior);
        $consulta->execute();

        return '{msg:"Precio actualizado"}';
    }
    
    public function updatePedidos1($codemi,$numero,$total,$items,$fpago)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE pedidos1 SET total=:total , items=:items,fpago=:fpago WHERE numero=:numero and codemi=:codemi";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':total', $total);
        $consulta->bindParam(':numero', $numero);
        $consulta->bindParam(':codemi', $codemi);
        $consulta->bindParam(':items', $items);
        $consulta->bindParam(':fpago', $fpago);
        $consulta->execute();

        return '{msg:"Total actualizado"}';
    }
    public function cerrarPedidos1($codemi,$numero,$hora)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE pedidos1 SET cerrado=1 , hora=:hora WHERE numero=:numero and codemi=:codemi";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':numero', $numero);
        $consulta->bindParam(':codemi', $codemi);
        $consulta->bindParam(':hora', $hora);
        $consulta->execute();
        
        $sql = "UPDATE pedidos2 SET cerrado=1  WHERE numcomp=:numero and codemi=:codemi";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':numero', $numero);
        $consulta->bindParam(':codemi', $codemi);
        $consulta->execute();

        return '{msg:"Preventa Cerrada"}';
    }
    public function updateCantidadCart($codart,$numcomp,$cantidad,$precio,$descu)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE pedidos2 SET cantidad=:cantidad, precio =:precio,descu=:descu WHERE codart=:codart and numcomp=:numcomp";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':cantidad', $cantidad);
        $consulta->bindParam(':codart', $codart);
        $consulta->bindParam(':numcomp', $numcomp);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':descu', $descu);
        $consulta->execute();

        return '{msg:"Cantidad actualizada"}';
    }
    public function updateImagen($codart,$uri)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE imagenesweb SET codart=:codart, uri =:uri WHERE codart=:codart";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codart', $codart);
        $consulta->bindParam(':uri', $uri);
        $consulta->execute();

        return '{msg:"Cantidad actualizada"}';
    }
    public function updateVisitas($cliente,$vendedor,$fechas,$horas,$pedido,$activo,$fpago)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE visitas SET fechas=:fechas, horas =:horas,pedido=:pedido,activo=:activo,fpago=:fpago WHERE vendedor=:vendedor and cliente=:cliente and (activo=1 or activo=3)";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':fechas', $fechas);
        $consulta->bindParam(':horas', $horas);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':cliente', $cliente);
        $consulta->bindParam(':pedido', $pedido);
        $consulta->bindParam(':activo', $activo);
        $consulta->bindParam(':fpago', $fpago);
        

        $consulta->execute();

        return '{msg:"Visita actualizada"}';
    }
    public function updateVisitasActivar($cliente,$vendedor,$fechas,$horas,$pedido,$activo,$onSite)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE visitas SET fechas=:fechas, horas =:horas,pedido=:pedido,activo=:activo,onsite=:onSite WHERE vendedor=:vendedor and cliente=:cliente and (activo=2 or activo=3) and pedido=0";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':fechas', $fechas);
        $consulta->bindParam(':horas', $horas);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':cliente', $cliente);
        $consulta->bindParam(':pedido', $pedido);
        $consulta->bindParam(':activo', $activo);
        $consulta->bindParam(':onSite', $onSite);

        $consulta->execute();

        return '{msg:"Visita Reactivada"}';
    }
    public function updateVisitasAnular($cliente,$vendedor,$pedido)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE visitas SET pedido=0,activo=2 WHERE vendedor=:vendedor and cliente=:cliente and ((activo=2 and pedido=:pedido) or (activo=3 and pedido=0)) ";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':vendedor', $vendedor);
        $consulta->bindParam(':cliente', $cliente);
        $consulta->bindParam(':pedido', $pedido);
        

        $consulta->execute();

        return '{msg:"Visita Anulada"}';
    }
   
}