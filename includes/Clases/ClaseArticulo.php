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
     function ingresarArticulo($datos){
       require './BD/conexionBD.php';
        $retorno = array();
        $query = "INSERT INTO articulos (Codigo,Marca,Modelo,Detalle,Precio,Cantidad,Imagen) VALUES ('";
        $query .= $datos["codigo"] . "','" . $datos["marca"] . "','" . $datos["modelo"] . "','". $datos["detalle"] . "','";
        $query .= $datos["precio"] . "','" .($datos["cantidad"]). "','" .$datos["imagen"]. "')";

        $resultado = $mysqli->query($query);
        $error = $mysqli->error;//retorna el error o una cadena vacía si no ocurrio errores

        if ($error != "") {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }  

    

}//fin de la claseArticulo

