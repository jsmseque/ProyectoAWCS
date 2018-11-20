<?php
 include './Clases/ClaseUsuario.php';
 include './Clases/ClaseArticulo.php';
 
 $Usuario=new ClaseUsuario();  
 $Articulo=new ClaseArticulo();
     $accion = $_POST["accion"];


switch ($accion) {
    case 'login':
        $retorno = $Usuario->Login($_POST);      
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
    
    case "ingresa-articulo":
        $retorno=$Articulo->ingresarArticulo($_FILES,$_POST);        
       if ($retorno["valido"]) {
          header("Location:/ProyectoAWCS/ingresar-articulo.php");
        } else {
            echo "Problemas al ingresar nuevo articulo.";
        }
        break;
    
    default:
        break;
}

echo json_encode($retorno); //para retornar un json