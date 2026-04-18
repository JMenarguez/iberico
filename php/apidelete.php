<?php

class ApiDelete
{
    public function deleteCliente($codigo)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "DELETE FROM clientes WHERE codigo=:codigo";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->execute();

        return '{"msg":"Cliente Borrado"}';
    }
    public function deleteProveed($codigo)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "DELETE FROM proveed WHERE codigo=:codigo";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->execute();

        return '{"msg":"Proveedor Borrado"}';
    }

    public function deleteArticulo($codigo)
    {

        $conexion = new ConexionWeb();
        $db = $conexion->getConexionWeb();
        $sql = "DELETE FROM articulos WHERE codigo=:codigo";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->execute();

        return '{"msg":"Articulo Borrado"}';
    }
    public function deleteCart($codigo,$numcomp)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "DELETE FROM pedidos2 WHERE codart=:codigo and numcomp=:numcomp";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codigo', $codigo);
        $consulta->bindParam(':numcomp', $numcomp);
        $consulta->execute();

        return '{"msg":"Articulo Borrado"}';
    }
    public function deletePedido($codemi,$numcomp)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "DELETE FROM pedidos1 WHERE codemi=:codemi and numero=:numcomp";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codemi', $codemi);
        $consulta->bindParam(':numcomp', $numcomp);
        $consulta->execute();

        return '{"msg":"Preventa Borrada"}';
    }
    public function deletePedidos2($codemi,$numcomp)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "DELETE FROM pedidos2 WHERE codemi=:codemi and numcomp=:numcomp";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':codemi', $codemi);
        $consulta->bindParam(':numcomp', $numcomp);
        $consulta->execute();

        return '{"msg":"Presupuesto Borrado"}';
    }
    public function deleteImagen($nombre,$host)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "DELETE FROM imagenesweb WHERE uri=:nombre";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();
        
        if($host=="SI")
        {
            $ruta='../assets/imagenes/'.$nombre;
            unlink($ruta);
        }

        
        return '{"msg":"Imagen Borrada"}';
        //return $ruta;
    }
    public function deleteOfertas($fecha)
    {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "DELETE FROM  ofertas WHERE fechafin<:fecha";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':fecha', $fecha);
        $consulta->execute();

        return '{msg:"Ofertas actualizados"}';
    }
}