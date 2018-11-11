<?php

class ClaseUsuario {
    /* ATRIBUTOS */

    private $Id;
    private $Cedula;
    private $Nombre;
    private $Apellidos;
    private $Email;
    private $Contrasenia;
    private $Rol;

    /* CONSTRUCTOR */

    function ClaseUsuario() {
        $this->Id = "";
        $this->Cedula = "";
        $this->Nombre = "";
        $this->Apellidos = "";
        $this->Email = "";
        $this->Contrasenia = "";
        $this->Rol = "";
    }

    /* METODOS DE LA CLASE */

    function getId() {
        return $this->Id;
    }

    function getCedula() {
        return $this->Cedula;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellidos() {
        return $this->Apellidos;
    }

    function getEmail() {
        return $this->Email;
    }

    function getContrasenia() {
        return $this->Contrasenia;
    }

    function getRol() {
        return $this->Rol;
    }

    /* METODOS ESPECIFICOS */

//Funcion Login
    function Login($datos) {
        require './BD/conexionBD.php';
        $retorno = array();
        $query = "SELECT * FROM tbusuario WHERE Cedula='" . $datos["cedula"] . "' AND Contrasenia='" . md5($datos["password"]) . "'";
        $resultado = $mysqli->query($query);

        if ($resultado->num_rows > 0) {
            session_start();
            $usuario = $resultado->fetch_assoc();
            $_SESSION["datos-usuario"] = array(
                "Id" => $usuario["Id"],
                "Cedula" => $usuario["Cedula"],
                "Nombre" => $usuario["Nombre"],
                "Apellidos" => $usuario["Apellidos"],
                "Email" => $usuario["Email"],
                "Rol" => $usuario["Rol"]
            );

            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

//Funcion crea nuevo usuario
    function CreaUsuario($datos) {
        require './BD/conexionBD.php';
        $retorno = array();
        $query = "INSERT INTO tbusuario (Cedula,Nombre,Apellidos,Email,Contrasenia,Rol) VALUES ('";
        $query .= $datos["cedula"] . "','" . $datos["nombre"] . "','" . $datos["apellidos"] . "','";
        $query .= $datos["email"] . "','" . md5($datos["contrasenia"]) . "','" . $datos["rol"] . "')";

        $resultado = $mysqli->query($query);
        $id = $mysqli->insert_id;

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

//Funcion eliminar usuario
    function EliminaUsuario($datos) {
        require './BD/conexionBD.php';
        $retorno = array();
        $query = "DELETE FROM tbusuario WHERE cedula='" . $datos["cedula"] . "'";
        $mysqli->query($query);

        if ($mysqli->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }

        return $retorno;
    }

//Funcion actualizazr
    function ActualizarUsuario($datos) {
        require './BD/conexionBD.php';
        $retorno = array();
        $query = "UPDATE tbusuario SET ";
        $query .= "Nombre='" . $datos["nombre"] . "', Apellidos='" . $datos["apellidos"] . "',";
        $query .= "Email='" . $datos["email"] . "', Contrasenia='" . $datos["contrasenia"] . "',";
        $query .= "Rol='" . $datos["rol"] . "' WHERE Cedula='" . $datos["cedula_buscar"] . "'";
        echo $query;

        $mysqli->query($query);

        if ($mysqli->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }

        return $retorno;
    }

    function ListarUsuarios() {
        require './BD/conexionBD.php';
        $retorno = array();
        $query = "SELECT * FROM tbusuario";

        $resultado = $mysqli->query($query);

        if ($resultado->num_rows > 0) {
            $usuarios = array();
            while ($usuario = $resultado->fetch_assoc()) {
                array_push($usuarios, $usuario);
            }

            $retorno["valido"] = true;
            $retorno["datos"] = $usuarios;
        } else {
            $retorno["valido"] = false;
        }

        Return $retorno;
    }

    function CerrarSesion() {
        session_start();
        session_destroy();

        //unset($_SESSION["datos-usuario"]); Elimina un indice de la sesion
    }

} //Fin de la clase