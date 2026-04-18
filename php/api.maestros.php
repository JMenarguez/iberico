<?php

class ApiMaestros
{
    public function getPerfiles()
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM perfiles";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "nivel"=> $fila['nivel'],
                );
            }
        }
        return $vector;
    }
    public function getEmpresa()
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM empresa";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "razon" => $fila['razon'],
                    "cuit" => $fila['cuit'],
                    "iva"=> $fila['iva'],
                    "usuarios"=>$fila['usuarios'],
                    "email"=>$fila['email'],
                    "direc"=>$fila['direc'],
                    "provin"=>$fila['provin'],
                    "telefono"=>$fila['telefono'],
                );
            }
        }
        return $vector;
    }
    public function getPuestos()
    {
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM puestos";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "fecha"=> $fila['fecha'],
                    "caja"=>$fila['caja'],
                    "usuario"=>$fila['usuario'],
                    
                );
            }
        }
        return $vector;
    }
    public function getParam()
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM param ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "liscos" => $fila['liscos'],
                    "lispre" => $fila['lispre'],
                    "lrubro" => $fila['lrubro'],
                    "maskcanti" => $fila['maskcanti'],
                    "cheqbak" => $fila['cheqbak'],
                );
            }

        }

        return $vector;
    }    
    public function getEstados($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        if ($cod != '') {
            $sql = "SELECT * FROM estados WHERE codigo = '$cod'";
        } else {
            $sql = "SELECT * FROM estados ";
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
                    "inhabilita" => $fila['inhabilita'],

                );

            }

        }

        return $vector;
    }   
    public function getCondiva()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM condiva ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "descrip" => $fila['descrip'],
                    "cuit" => $fila['cuit'],
                
                );

            }

        }

        return $vector;
    }     
    public function getGravamen()
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM gravamen ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                    "imp1"=>$fila['imp1'],
                );

            }

        }

        return $vector;
    }    
    public function getFPago()
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM fpago ";
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

        return $vector;
    }    
    public function getParamVendUsuario($cod,$clave)
    {

        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql ="  SELECT usuario,vendedor,nomvend,nivel,email ,listas,descmax,liscos,lispre,maskcanti,lrubro,cheqbak FROM usuarios,vendedor,param where email='$cod' and vendedor=vendedor.codigo";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "usuario" => $fila['usuario'],
                    "vendedor" => $fila['vendedor'],
                    "nomvend" => $fila['nomvend'],
                    "nivel" => $fila['nivel'],
                    "email" => $fila['email'],
                    "listas" => $fila['listas'],
                    "descmax" => $fila['descmax'],
                    "liscos" => $fila['liscos'],
                    "lispre" => $fila['lispre'],
                    "maskcanti" => $fila['maskcanti'],
                    "lrubro" => $fila['lrubro'],
                    "cheqbak" => $fila['cheqbak'],
                );
            }

        }

        return $vector;
    }    
    public function getZonas($cod)
    {

        $vector = array();

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT * FROM zonas ";
        $consulta = $db->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        if (count($resultado) > 0) {
            if ($cod === '') {
                $vector[] = array(
                    "codigo" => "00",
                    "nombre" => "SIN ZONA");
            }
            foreach ($resultado as $fila) {
                //$cod++;
                $vector[] = array(
                    "codigo" => $fila['codigo'],
                    "nombre" => $fila['nombre'],
                );

            }

        }

        return $vector;
    }    
}
