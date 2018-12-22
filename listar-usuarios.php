<?php   
include './includes/Clases/ClaseUsuario.php';
include './referencias.html';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Usuarios</title>
    </head>
    <body>
        <h1>Listar Usuarios</h1>
        <?php        
        $Usuario = new ClaseUsuario();
        $resultado = $Usuario->ListarUsuarios();
          if($resultado["valido"]){
              $contador=1;
              foreach ($resultado["datos"] as $usuario){                
                  echo "Registro No:" . $contador ;
                  echo "<div>Cedula:". $usuario["Cedula"] . "</div>";
                  echo "<div>Nombre:". $usuario["Nombre"] . "</div>";
                  echo "<div>Apellidos:". $usuario["Apellidos"] . "</div>";
                  echo "<div>Email:". $usuario["Email"] . "</div>";
                  echo "<div>Rol:". $usuario["Rol"] . "</div>";
                  echo "======================================<br>";
                  $contador++;
              } 
          }else{
              echo "<div><p>No se encontraron usuarios.</p></div>";              
          }
        ?>
        <div>
           <div></div>
        </div>       

    </body>
</html>
