<?php
include './Clases/ClaseArticulo.php';

$Articulo = new ClaseArticulo();
$accion = $_POST["accion"];

switch ($accion) {
    case 'cargar-articulos':
            $resultado = $Articulo->ListarProductos();
                echo json_encode($resultado["datos"]);          
        break;
default:
        break;
}

