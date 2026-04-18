<?php
require_once('config.inc.php');
require_once('conexion.inc.php');
require_once('api.php');
require_once('apiupdate.php');
require_once('apidelete.php');
require_once('apiinsert.php');
require_once('api.maestros.php');
require_once('cors.php');

$method=$_SERVER['REQUEST_METHOD'];
$cod=$_GET['codigo'];
$base=$_GET['base'];
$clave=$_GET['clave'];
$clave1=$_GET['clave1']??"";
$clave2=$_GET['clave2']??"";
$clave3=$_GET['clave3']??"";
$clave4=$_GET['clave4']??"";


if($method=='GET'){
    switch ($base) {
        case 'empresa':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getEmpresa();
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'param':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getParam();
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'paramvendusuario':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getParamVendUsuario($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'puestos':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getPuestos();
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'perfiles':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getPerfiles();
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'zonas':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getZonas($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'imagenes':
            $vector=array();
            $api=new Api();
            $vector=$api->getImagenes($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'usuarios':
            $vector=array();
            $api=new Api();
            $vector=$api->getUsuario($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'usuariosactivos':
            $vector=array();
            $api=new Api();
            $vector=$api->getUsuariosActivos();
            $json=json_encode($vector);
            print_r( $json);
            break;   
        case 'fpago':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getFPago();
            $json=json_encode($vector);
            print_r( $json);
            break;             
        case 'clientes':
            $vector=array();
            $api=new Api();
            $vector=$api->getClientes($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'clientescoords':
            $vector=array();
            $api=new Api();
            $vector=$api->getClientesCoords($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'ultimo':
            $vector=array();
            $api=new Api();
            $vector=$api->getUltimoCodigo($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;
            
        case 'clisearch':
            $vector=array();
            $api=new Api();
            $vector=$api->getCliSearch($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;     
        case 'estados':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getEstados($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'condiva':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getCondiva();
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'articulos':
            $vector=array();
            $api=new Api();
            $vector=$api->getArticulos($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'rubros':
            $vector=array();
            $api=new Api();
            $vector=$api->getRubros();
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'artsearch':
            $vector=array();
            $api=new Api();
            $vector=$api->getArtSearch($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;             
        case 'artsearchpres':
            $vector=array();
            $api=new Api();
            $vector=$api->getArtSearchPres($cod,$clave,$clave1);
            $json=json_encode($vector);
            print_r( $json);
            break;             
        case 'artsearchlimit':
           
            $vector=array();
            $api=new Api();
            $vector=$api->getArtSearchLimit($cod,$clave,$clave1,$clave2,$clave3,$clave4);
            $json=json_encode($vector);
            print_r( $json);
            break;             
        case 'rubsearch':
            $vector=array();
            $api=new Api();
            $vector=$api->getRubSearch($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;             
        case 'gravamen':
            $vector=array();
            $api=new ApiMaestros();
            $vector=$api->getGravamen();
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'impuesto':
            $vector=array();
            $api=new Api();
            $vector=$api->getIVA($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'listas':
            $vector=array();
            $api=new Api();
            $vector=$api->getListas($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'listasvend':
            $vector=array();
            $api=new Api();
            $vector=$api->getListasVend($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;    
        case 'stocksearch':
            $vector=array();
            $api=new Api();
            $vector=$api->getStockSearch($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;     
        case 'ventasart':
            $vector=array();
            $api=new Api();
            $vector=$api->getVentasArt($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;     
        case 'comprasart':
            $vector=array();
            $api=new Api();
            $vector=$api->getComprasArt($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;     
        case 'preciossearch':
            $vector=array();
            $api=new Api();
            $vector=$api->getPreciosSearch($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;     

        
        case 'bancos':
            $vector=array();
            $api=new Api();
            $vector=$api->getBancos();
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'movibancos':
            $vector=array();
            $api=new Api();
            $vector=$api->getMoviBancos($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;      
               
        case 'proveed':
            $vector=array();
            $api=new Api();
            $vector=$api->getProveed($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;   
        case 'provsearch':
            $vector=array();
            $api=new Api();
            $vector=$api->getProvSearch($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;  
        case 'sucursal':
            $vector=array();
            $api=new Api();
            $vector=$api->getSucursal();
            $json=json_encode($vector);
            print_r( $json);
            break;             
        case 'cierres':
            $vector=array();
            $api=new Api();
            $vector=$api->getMoviCajas($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'cierresfiltro':
            $vector=array();
            $api=new Api();
            $vector=$api->getMoviCajasFiltro($cod,$clave,$clave1,$clave2);
            $json=json_encode($vector);
            print_r( $json);
            break;

        case 'searchcaja':
            $vector=array();
            $api=new Api();
            $vector=$api->searchCaja($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;      
       
        case 'pedidos1':
            $vector=array();
            $api=new Api();
            $vector=$api->getPedidos1($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'pedidos1ultimo':
            $vector=array();
            $api=new Api();
            $vector=$api->getpedidos1Ultimo();
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'pedidos1ultimoscli':
            $vector=array();
            $api=new Api();
            $vector=$api->getPedidos1UltimosCli($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'pedidos2':
            $vector=array();
            $api=new Api();
            $vector=$api->getPedidos2($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'pedidos1total':
            $vector=array();
            $api=new Api();
            $vector=$api->getPedidos1Total($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'pedidos2cantidad':
            $vector=array();
            $api=new Api();
            $vector=$api->getPedidos2Cantidad($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;      
        case 'movicta':
            $vector=array();
            $api=new Api();
            $vector=$api->getMoviCta($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;
            
        case 'localid':
            $vector=array();
            $api=new Api();
            $vector=$api->getLocalid();
            $json=json_encode($vector);
            print_r( $json);
            break;
            
        case 'vendedor':
            $vector=array();
            $api=new Api();
            $vector=$api->getVendedor($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;
            
        case 'preciossearch':
            $vector=array();
            $api=new Api();
            $vector=$api->getPreciosCodLis($cod,$clave);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'stockpendiente':
            $vector=array();
            $api=new Api();
            $vector=$api->getStockPend();
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'stockpendientecli':
            $vector=array();
            $api=new Api();
            $vector=$api->getStockPendCli($cod);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'vendedorubica':
            $vector=array();
            $api=new Api();
            $vector=$api->getvendedorUbica($cod,$clave,$clave1);
            $json=json_encode($vector);
            print_r( $json);
            break;
        case 'pedidoborrado':
            //$vector=array();
            $api=new Api();
            $vector=$api->getPedidoBorrado($cod);
            //$json=json_encode($vector);
            print_r( $vector);
            break;

            
            case 'ofertas':
                $vector=array();
                $api=new Api();
                $vector=$api->getOfertas($cod,$clave);
                $json=json_encode($vector);
                print_r( $json);
                break;
                
            
            case 'ofertasuna':
                $vector=array();
                $api=new Api();
                $vector=$api->getOfertasUna($cod);
                $json=json_encode($vector);
                print_r( $json);
                break;
                
            }  
    }


//actualizar

if($method == "PUT"){
    switch ($base) {
        case 'usuarios':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $email = $data['email'];
            $clave = $data['clave'];
            $usuario = $data['usuario'];
            $empresa = $data['empresa'];
            $vendedor = $data['vendedor'];
            $nomvend = $data['nomvend'];
            

            $nivel = $data['nivel'];
            $api = new ApiUpdate();
            $json = $api->updateUsuario($email, $clave, $usuario,$empresa,$vendedor,$nomvend,$nivel);
            echo $json;
            break;  
        case 'usuarioestado':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $activo = $data['activo'];
            $email  = $data['email'];
            $device = $data['device'];

            $api = new ApiUpdate();
            $json = $api->updateUsuarioEstado($email, $activo,$device);
            echo $json;
            break;  

        case 'clientes':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $razon = $data['razon'];
            $domicilio = $data['domicilio'];
            $nomloc = $data['nomloc'];
            $condiva = $data['condiva'];
            $cuit = $data['cuit'];
            $email=$data['email'];
            $telefono=$data['telefono'];
            $estado = $data['estado'];
            $dni = $data['dni'];
            $localidad=$data['localidad'];
            $fantasia=$data['fantasia'];
            $vendedor=$data['vendedor'];
            $zona=$data['zona'];

            $api = new ApiUpdate();
            $json = $api->updateCliente($codigo, $razon, $domicilio,$nomloc,$localidad,$condiva,$cuit,$email,$telefono,$estado,$dni,$fantasia,$vendedor,$zona);
            echo $json;
            break;
        case 'clientescoor':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $latitud = $data['latitud'];
            $longitud = $data['longitud'];
            $api = new ApiUpdate();
            $json = $api->updateClienteCoor($codigo, $latitud, $longitud);
            echo $json;
            break;
        case 'proveed':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $razon = $data['razon'];
            $domicilio = $data['domicilio'];
            $condiva = $data['condiva'];
            $cuit = $data['cuit'];
            $email=$data['email'];
            $telefono=$data['telefono'];
            $codloc=$data['codloc'];
            $localidad=$data['localidad'];
            $api = new ApiUpdate();
            $json = $api->updateProveed($codigo, $razon, $domicilio,$condiva,$cuit,$email,$telefono,$codloc,$localidad);
            echo $json;
            break;
        case 'articulos':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $nombre = $data['nombre'];
            $gravamen = $data['gravamen'];
            $barras = $data['barras'];
            $proveedor = $data['proveedor'];
            $api = new ApiUpdate();
            $json = $api->updateArticulo($codigo, $nombre, $gravamen,$barras,$proveedor);
            echo $json;
            break;  
        case 'barras':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $barras = $data['barras'];
            $api = new ApiUpdate();
            $json = $api->updateBarras($codigo,$barras);
            echo $json;
            break;  
        case 'precios':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $precio = $data['precio'];
            $lista = $data['lista'];
            $fecha = $data['fecha'];
            $anterior= $data['anterior'];
            $api = new ApiUpdate();
            $json = $api->updatePrecio($codigo, $lista, $precio,$fecha,$anterior);
            echo $json;
            break;  
            
        case 'param':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $liscos = $data['liscos'];
            $lispre = $data['lispre'];
            $lrubro = $data['lrubro'];
            $maskcanti = $data['maskcanti'];
            $cheqbak = $data['cheqbak'];
            $api = new ApiUpdate();
            $json = $api->updateParam($liscos, $lispre, $lrubro, $maskcanti,$cheqbak);
            echo $json;
            break;  
        case 'pedidos1':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codemi = $data['codemi'];
            $numero = $data['numero'];
            $total = $data['total'];
            $items = $data['items'];
            $fpago = $data['fpago'];

            $api = new ApiUpdate();
            $json = $api->updatePedidos1($codemi,$numero,$total,$items,$fpago);
            echo $json;
            break;  
        case 'pedidos1cerrar':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codemi = $data['codemi'];
            $numero = $data['numero'];
            $hora = $data['hora'];
            $api = new ApiUpdate();
            $json = $api->cerrarPedidos1($codemi,$numero,$hora);
            echo $json;
            break;  
        case 'pedidos2cantidad':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $cantidad = $data['cantidad'];
            $codart = $data['codart'];
            $numcomp = $data['numcomp'];
            $precio = $data['precio'];
            $desc=$data['desc'];

            $api = new ApiUpdate();
            $json = $api->updateCantidadCart($codart,$numcomp,$cantidad,$precio,$desc);
            echo $json;
            break;  
        case 'imagen':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codart = $data['codart'];
            $uri = $data['origen'];
            $api = new ApiUpdate();
            $json = $api->updateImagen($codart,$uri);
            echo $json;
            break;  
        case 'visitascerrar':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $cliente = $data['cliente'];
            $vendedor = $data['vendedor'];
            $fechas = $data['fechas'];
            $horas = $data['horas'];
            $pedido = $data['pedido'];
            $activo = $data['activo'];
            $fpago = $data['fpago'];
         

            $api = new ApiUpdate();
            $json = $api->updateVisitas($cliente,$vendedor,$fechas,$horas,$pedido,$activo,$fpago);
            echo $json;
            break;  
        case 'visitasactivar':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $cliente = $data['cliente'];
            $vendedor = $data['vendedor'];
            $fechas = $data['fechas'];
            $horas = $data['horas'];
            $pedido = $data['pedido'];
            $activo = $data['activo'];
            $onSite = $data['onSite'];

            $api = new ApiUpdate();
            $json = $api->updateVisitasActivar($cliente,$vendedor,$fechas,$horas,$pedido,$activo,$onSite);
            echo $json;
            break;  
        case 'visitasanular':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $cliente = $data['cliente'];
            $vendedor = $data['vendedor'];
            $pedido = $data['pedido'];
            $api = new ApiUpdate();
            $json = $api->updateVisitasAnular($cliente,$vendedor,$pedido);
            echo $json;
            break;  
        
         
    }

    
}
if($method == "DELETE"){
    switch ($base) {
        case 'clientes':
            $json=null;
            $id=$_REQUEST['codigo'];
            $api= new ApiDelete();
            $json = $api->deleteCliente($id);
            echo $json;
            break;
        case 'proveed':
            $json=null;
            $id=$_REQUEST['codigo'];
            $api= new ApiDelete();
            $json = $api->deleteProveed($id);
            echo $json;
            break;
        case 'articulos':
            $json=null;
            $id=$_REQUEST['codigo'];
            $api= new ApiDelete();
            $json = $api->deleteArticulo($id);
            echo $json;
            break;     
        case 'pedidos1':
            $json=null;
            $codemi=$_REQUEST['clave'];
            $numcomp=$_REQUEST['codigo'];
            $api= new ApiDelete();
            $json = $api->deletePedido($codemi,$numcomp);
            echo $json;
            break;     
        case 'pedidos2':
            $json=null;
            $codemi=$_REQUEST['clave'];
            $numcomp=$_REQUEST['codigo'];
            $api= new ApiDelete();
            $json = $api->deletePedidos2($codemi,$numcomp);
            echo $json;
            break;     
        case 'pedidos2cart':
            $json=null;
            $id=$_REQUEST['codigo'];
            $numcomp=$_REQUEST['clave'];
            $api= new ApiDelete();
            $json = $api->deleteCart($id,$numcomp);
            echo $json;
            break;     
        case 'imagen':
            $json=null;
            $id=$_REQUEST['codigo'];
            $host=$_REQUEST['clave'];
            $api= new ApiDelete();
            $json = $api->deleteImagen($id,$host);
            echo $json;
            break;     
        case 'ofertaslimite':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $fecha = $_REQUEST['codigo'];
            $api = new ApiDelete();
            $json = $api->deleteOfertas($fecha);
            echo $json;
            break;  
    }
    
}
if($method == "POST"){
    switch ($base) {
        case 'usuarios':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $email = $data['email'];
            $clave = $data['clave'];
            $usuario = $data['usuario'];
            $empresa = $data['empresa'];
            $vendedor = $data['vendedor'];
            $nomvend = $data['nomvend'];
            $api = new ApiInsert();
            $json = $api->addUsuario($email, $clave, $usuario,$empresa,$vendedor,$nomvend);
            echo $json;
            break;  
        
        case 'paramjson':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $liscos = $data['liscos'];
            $lispre = $data['lispre'];
            $lrubro = $data['lrubro'];
            $maskcanti = $data['maskcanti'];
            $api = new ApiInsert();
            $json = $api->addParamJson($liscos,$lispre,$lrubro,$maskcanti);
            echo $json;
            break;     
        case 'clientes':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $razon = $data['razon'];
            $domicilio = $data['domicilio'];
            $nomloc = $data['nomloc'];
            $localidad = $data['localidad'];
            $condiva = $data['condiva'];
            $cuit = $data['cuit'];
            $email=$data['email'];
            $telefono=$data['telefono'];
            $estado = $data['estado'];
            $dni = $data['dni'];
            $fantasia = $data['fantasia'];
            $vendedor = $data['vendedor'];
            $zona = $data['zona'];

            $api = new ApiInsert();
            $json = $api->addCliente($codigo, $razon, $domicilio,$nomloc,$localidad,$condiva,$cuit,$email,$telefono,$estado,$dni,$fantasia,$vendedor,$zona);
            echo $json;
            break;    
        case 'precios':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codigo = $data['codigo'];
            $precio = $data['precio'];
            $lista = $data['lista'];
            $fecha = $data['fecha'];
            $api = new ApiInsert();
            $json = $api->addPrecio($codigo, $precio, $lista,$fecha);
            echo $json;
            break;  
        case 'pedidos1':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $numero = $data['numero'];
            $fecha = $data['fecha'];
            $puesto = $data['puesto'];
            $codcli = $data['clidata']['codigo'];
            $razon = $data['clidata']['razon'];
            $codemi = $data['codemi'];
            $codiva = $data['clidata']['condiva'];
            $cuit = $data['clidata']['cuit'];
            $dni = $data['clidata']['dni'];
            $vendedor = $data['vendedor'];
            $nomvend = $data['nomvend'];
            $fpago = $data['fpago'];
            $lista = $data['lista'];
            $oper = $data['oper'];
            

            $api = new ApiInsert();
            $json = $api->addPedidos1($oper,$fecha,$codemi, $numero, $puesto,$codcli,$razon,$codiva,$cuit,$dni,$vendedor,$nomvend,$fpago,$lista);
                         
            break;  
        case 'pedidos2':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $fecha = $data['fecha'];
            $codemi = $data['codemi'];
            $numcomp = $data['numcomp'];
            $puesto = $data['puesto'];
            $codart = $data['codart'];
            $cantidad = $data['cantidad'];
            $precio = $data['precio'];
            $tasa = $data['tasa'];
            $descu = $data['desc'];
            $codcli = $data['codcli'];
            $oper = $data['oper'];
            $api = new ApiInsert();
            $json = $api->addPedidos2($oper,$fecha,$codemi, $numcomp, $puesto,$codart,$cantidad,$precio,$tasa,$descu,$codcli);
            echo $json;
            break;  
        case 'imagenes':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $codart = $data['codart'];
            $uri = $data['uri'];
            $api = new ApiInsert();
            $json = $api->addImagen($codart, $uri);
            echo $json;
            break;      
        case 'guardar':
           // $c = new controladorAreaConocimiento();
           $json = null;
           $data = json_decode(file_get_contents("php://input"), true);
           $origen = $data['origen'];
           $codart =$data['codart'];
           $api = new ApiInsert();
           $json = $api->addImagen($codart,$origen);
           echo $json;
           
           break;     
        case 'cambios':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $tabla = $data['tabla'];
            $campo1 = $data['campo1'];
            $valor1 = $data['valor1'];
            $codigo = $data['codigo'];
            $campo2 = $data['campo2'];
            $valor2 = $data['valor2'];
            $api = new ApiInsert();
            $json = $api->addCambios($tabla,$campo1,$valor1,$codigo,$campo2,$valor2);
            echo $json;
            break; 
        case 'visitas':
            $json = null;
            $data = json_decode(file_get_contents("php://input"), true);
            $fecha = $data['fecha'];
            $hora = $data['hora'];
            $cliente = $data['cliente'];
            $razon = $data['razon'];
            $vendedor = $data['vendedor'];
            $nomvend = $data['nomvend'];
            $activo = $data['activo'];
            $latitud = $data['latitud'];
            $longitud = $data['longitud'];
            $onSite = $data['onSite'];
            
            $api = new ApiInsert();
            $json = $api->addVisitas($fecha,$hora,$cliente,$razon,$vendedor,$nomvend,$activo,$latitud,$longitud,$onSite);
                                     
            echo $json;
            break; 
        }
    }