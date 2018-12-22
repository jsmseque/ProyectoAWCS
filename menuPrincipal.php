<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include './referencias.html';
        include './includes/Clases/ClaseArticulo.php';
        include './ValidaAcceso.php';
        ?>
        <script src="JS/scripts/index.js" type="text/javascript"></script>
        <title>Inicio</title>
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
                    <a class="navbar-brand" href="menuPrincipal.php">Bienvenido(a)- <?php echo $nombre ?> </a>
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
        
        <h1>Menú principal</h1>         
        <div id="divArticulos" class="container-fluid">     
        </div>
        
        <div></div>
        
         <div>
            <h1>Carrito</h1>
            <input type="button" id="btnMostrarCarrito" class="btn btn-info" value="Mostrar carrito" onclick="verCarrito">
         </div>
        <div id="divCarrito" class="container-fluid">
 
        </div>
        
    </body>
</html>
