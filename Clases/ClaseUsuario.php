<?php

class ClaseUsuario {
    /* ATRIBUTOS */
    private $Cedula;
    private $Nombre;
    private $Apellidos;
    private $Telefono;
    private $Email;
    private $NombreUsuario;
    private $Contrasenia;
    private $Rol;

    /* CONSTRUCTOR */

    function ClaseUsuario() {
        $this->Cedula = "";
        $this->Nombre = "";
        $this->Apellidos = "";
        $this->Telefono = "";
        $this->Email = "";
        $this->NombreUsuario = "";
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
                "Cedula" => $usuario["Cedula"],
                "Nombre" => $usuario["Nombre"],
                "Apellidos" => $usuario["Apellidos"],
                "Telefono"=> $usuario["Telefono"],
                "Email" => $usuario["Email"],
                "NombreUsuario" => $usuario["NombreUsuario"],
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
        $query = "INSERT INTO usuarios (Cedula,Nombre,Apellidos,Telefono,Email,NombreUsuario,Contrasenia,Rol) VALUES ('";
        $query .= $datos["cedula"] . "','" . $datos["nombre"] . "','" . $datos["apellidos"] . "','". $datos["Telefono"] . "','";
        $query .= $datos["email"] . "','" .($datos["NombreUsuario"]). "','" . md5($datos["contrasenia"]) . "','" . $datos["rol"] . "')";

        $resultado = $mysqli->query($query);
        $error = $mysqli->error;//retorna el error o unca cadena vacía si no ocurrio errores

        if ($error != "") {
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
        $query = "DELETE FROM usuarios WHERE cedula='" . $datos["cedula"] . "'";
        $mysqli->query($query);

        if ($mysqli->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }

        return $retorno;
    }

//Funcion actualizar
 // podria actualizar con el nombre de usuario, aun por definir*****, de momento funciona con la cedula
    function ActualizarUsuario($datos) {
        require './BD/conexionBD.php';
        $retorno = array();
        $query = "UPDATE usuarios SET ";
        $query .= "Nombre='" . $datos["nombre"] . "', Apellidos='" . $datos["apellidos"] . "',";
        $query .= "Telefono='" . $datos["telefono"] . "', NombreUsuario='" . $datos["nombreUsuario"] . "',";
        $query .= "Email='" . $datos["email"] . "', Contrasenia='" . md5($datos["contrasenia"]) . "',";
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
        $query = "SELECT * FROM usuarios";

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