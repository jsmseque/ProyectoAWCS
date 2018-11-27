<?php

class ClaseArticulo {

    //atributos
    private $Codigo;
    private $Marca;
    private $Modelo;
    private $Detalle;
    private $Precio;
    private $Cantidad;
    private $Imagen;

    //contructor
    function ClaseArticulo() {
        $this->Codigo = "";
        $this->Marca = "";
        $this->Modelo = "";
        $this->Detalle = "";
        $this->Precio = 0;
        $this->Cantidad = 0;
        $this->Imagen = "";
    }
    
     //metodos de la clase
     function getCodigo() {
         return $this->Codigo;
     }

     function getMarca() {
         return $this->Marca;
     }

     function getModelo() {
         return $this->Modelo;
     }

     function getDetalle() {
         return $this->Detalle;
     }

     function getPrecio() {
         return $this->Precio;
     }

     function getCantidad() {
         return $this->Cantidad;
     }

     function getImagen() {
         return $this->Imagen;
     }

/* METODOS ESPECIFICOS */
    //Funcion ingresar articulo
    function ingresarArticulo($file, $datos) {
        $retorno = array();
        
        if(!$this->guardaImagen($file)){
           $retorno["valido"] = false; 
        } else {
        require '../BD/conexionBD.php';
        $query = "INSERT INTO articulos (Codigo,Marca,Modelo,Detalle,Precio,Cantidad,Imagen) VALUES ('";
        $query .= $datos["codigo"] . "','" . $datos["marca"] . "','" . $datos["modelo"] . "','" . $datos["detalle"] . "','";
        $query .= $datos["precio"] . "','" . ($datos["cantidad"]) . "','" . basename($file['imagen']['name']) . "')";

        $resultado = $mysqli->query($query);
        $error = $mysqli->error; //retorna el error o una cadena vacía si no ocurrio errores
        
        if ($error != "") {
            $retorno["valido"] = false;
        } else {
            $retorno["valido"] = true;
        }
        }
        return $retorno;
    }

    //funcion para validad imagen
     private function guardaImagen($file){
        
        $retorno = false;
        $ruta_imagen = "../imagenes/articulos/";
        $nombreImagen = basename($file['imagen']['name']);
        $ruta_imagen = $ruta_imagen . $nombreImagen;

        //se asegura que sea una imagen menor a 500KB jpg o png
        if ($_FILES['imagen']['size'] < 500000 AND $_FILES['imagen']['type'] == "image/jpeg"
                OR $_FILES['imagen']['type'] == "image/png") {
            if (move_uploaded_file($file['imagen']['tmp_name'], $ruta_imagen)) {
                $retorno = true;
            } 
        }
         return $retorno;
    }//fin de funcion guardaImagen()
    
    //funcion listar productos
    function ListarProductos() {
        require '../BD/conexionBD.php';
        
        $retorno = array();
        $query = "SELECT * FROM articulos";

        $resultado = $mysqli->query($query);

        if ($resultado->num_rows > 0) {
            $productos= array();
            while ($producto = $resultado->fetch_assoc()) {
                array_push($productos, $producto);
            }

            $retorno["valido"] = true;
            $retorno["datos"] = $productos;
        } else {
            $retorno["valido"] = false;
        }

        Return $retorno;
    }//fin listar productos
    
    
    

}//fin de la claseArticulo

