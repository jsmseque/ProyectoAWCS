<?php   
include './includes/Clases/ClaseUsuario.php';
include './referencias.html';
include './ValidaAcceso.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Usuarios</title>
    </head>
    <body>
        <?php
        $nombre = $_SESSION["datos-usuario"]["Nombre"];
        $rol = $_SESSION["datos-usuario"]["Rol"];
        ?>
        <header> 
            <nav class="navbar navbar-default" role="navigation">
                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Desplegar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Bienvenido(a)- <?php echo $nombre ?> </a>
                </div>

                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="menuPrincipal.php">Catálogo</a></li>
                        <?php
                        if ($rol == "Admin") {
                            ?>
                            <li class="active"><a href="ingresar-articulo.php">Ingresar Artículos</a></li>
                            <li class="active"><a href="crear-usuario.php">Crear Usuario</a></li>
                            <li class="active"><a href="listar-usuarios.php">Lista de Usuarios</a></li>
                        <?php } ?>       
                        <li><a><form id="frmLogout" method="post" action="includes/procesadatos.php">
                                    <input type="hidden" name="accion" value="logout">
                                    <input type="submit" name="btnLogout" value="Cerrar Sesion">
                                </form></a></li>   
                        <li></li>
                    </ul>
                </div>
            </nav>
        </header>
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
