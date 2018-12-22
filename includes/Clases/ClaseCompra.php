<?php

class ClaseCompra {
    
    //atributos
    private $Id;
    private $IdUsuario;
    private $IdArticulo;
    private $NumeroFactura;
    private $FechaFactura;
    
    //contructor
    function ClaseCompra() {
        $this->Id = "";
        $this->IdUsuario = "";
        $this->IdArticulo = "";
        $this->NumeroFactura = "";
        $this->FechaFactura =  date("Y-m-d");
    }
    
    //metodos get
    function getId() {
        return $this->Id;
    }

    function getIdUsuario() {
        return $this->IdUsuario;
    }

    function getIdArticulo() {
        return $this->IdArticulo;
    }

    function getNumeroFactura() {
        return $this->NumeroFactura;
    }

    function getFechaFactura() {
        return $this->FechaFactura;
    }

/* METODOS ESPECIFICOS */
 function nuevaCompra($datos) {
        $retorno = array();
        echo $datos["codigo"] ;
        require '../BD/conexionBD.php';
        $query = "INSERT INTO compras (IdUsuario,IdArticulo,NumeroFactura,FechaCompra) VALUES ('";
        $query .= $datos["idUsuario"] . "','" . $datos["codigo"] . "','" . $datos["factura"] . "','" . $datos["fecha"] .  "')";

       
        echo $query ;
        $resultado = $mysqli->query($query);
        $error = $mysqli->error; //retorna el error o una cadena vacía si no ocurrio errores
        
        //saca articulo de la lista
         $Articulo = new ClaseArticulo();
         $Articulo->SacarProducto($datos["codigo"]);
         
         
        if ($error != "") {
            $retorno["valido"] = false;
        } else {
           
            
            $retorno["valido"] = true;
        }
         $retorno["valido"] = true;
        return $retorno;
    }

}
