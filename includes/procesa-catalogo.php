<?php
include './Clases/ClaseArticulo.php';
include './Clases/ClaseCompra.php';
include '../validaAcceso.php';


$Articulo = new ClaseArticulo();
$Compra= new ClaseCompra();
$accion = $_POST["accion"];

switch ($accion) {
    case 'cargar-articulos':
            $resultado = $Articulo->ListarProductos();
                echo json_encode($resultado["datos"]);          
        break;
    case 'comprar-articulo':      
        $idUsuario= $_SESSION["datos-usuario"]["Cedula"];
        $fecha=date("Y-m-d");
        $factura=mt_rand(1,9999);//numero de factura aleatorio
        $codigo=$_POST["idArticulo"];
        $datos= ["idUsuario"=>$idUsuario,"codigo"=>$codigo,"factura"=>$factura,"fecha"=>$fecha];      
       $resultado = $Compra->nuevaCompra($datos);  
       $Articulo->SacarProducto($_POST["idArticulo"]);      
       echo json_encode($resultado["valido"]);          
        break;
default:
        break;
}

