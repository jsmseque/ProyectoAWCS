<?php
include './Clases/ClaseArticulo.php';
include './Clases/ClaseCompra.php';

$Articulo = new ClaseArticulo();
$Compra= new ClaseCompra();
$accion = $_POST["accion"];

switch ($accion) {
    case 'cargar-articulos':
            $resultado = $Articulo->ListarProductos();
                echo json_encode($resultado["datos"]);          
        break;
    case 'comprar-articulo':
            $resultado = $Compra->nuevaCompra($_POST);
                echo json_encode($resultado["datos"]);          
        break;
default:
        break;
}

