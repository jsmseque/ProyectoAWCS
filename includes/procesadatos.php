<?php
 include './Clases/ClaseUsuario.php';   
 $Usuario=new ClaseUsuario();  
 
$accion = $_POST["accion"];

switch ($accion) {
    case 'login':
    $retorno =$Usuario->login($_POST);
        if ($retorno["valido"]) {
            header("Location:index.php");
        }else{
            echo "Cedula o password incorrecta";
        }
        break;
    case "crea-usuario":
        $retorno = $Usuario->CreaUsuario($_POST);
         if ($retorno["valido"]) {
           echo "El usuario se insertó correctamente.";
        } else {
            echo "Problemas al insertar el usuario.";
        }
        break;
    case "elimina-usuario":
     $retorno = $Usuario->EliminaUsuario($_POST);
            if ($retorno["valido"]) {
           echo "El usuario se eliminó correctamente.";
        } else {
            echo "Problemas al eliminar el usuario.";
        }
        break;

     case "actualiza-usuario":
     $retorno = $Usuario->ActualizarUsuario($_POST);
            if ($retorno["valido"]) {
           echo "El usuario se actualizó correctamente.";
        } else {
            echo "Problemas al actualizar el usuario.";
        }
        break;

    case "logout":
      $retorno=$Usuario->CerrarSession();
      header("Location: index.php");
    break;
    

    default:
        break;
}