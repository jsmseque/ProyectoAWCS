<?php
include './Clases/ClaseArticulo.php';


$Articulo = new ClaseArticulo();
            $resultado = $Articulo->ListarProductos();
                echo json_encode($resultado["datos"]);
            
