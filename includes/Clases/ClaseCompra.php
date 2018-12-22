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
        
        if(!$this->guardaImagen($file)){
           $retorno["valido"] = false; 
        } else {
        require '../BD/conexionBD.php';
        $query = "INSERT INTO compras (IdUsuario,IdArticulo,NumeroFactura,FechaCompra) VALUES ('";
        $query .= $datos["idusuario"] . "','" . $datos["idArticulo"] . "','" . $datos["numeroFactura"] . "','" . $datos["fecha"] .  "')";


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

}
