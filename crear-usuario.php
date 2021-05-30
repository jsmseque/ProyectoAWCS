<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Usuario</title>
          <?php
          include './referencias.html';
           include './ValidaAcceso.php';?>
        <script src="JS/scripts/usuarios.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        $nombre = $_SESSION["datos-usuario"]["Nombre"];
        $rol = $_SESSION["datos-usuario"]["Rol"];
        ?>
        <header> 
            <nav class="navbar navbar-default" role="navigation">
                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles .....-->
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
        <h1>Ingrese el Nuevo Usuario</h1>
        <div>
            <form id="frmCrearUsuario" name="frmCrearUsuario" method="post" >
                <input type="text" name="cedula" class="campos" placeholder="Ingrese la cedula" value="">
                <input type="text" name="nombre" class="campos" placeholder="Ingrese su nombre" value="">
                <input type="text" name="apellidos" class="campos"  placeholder="Ingrese sus apellidos" value="">
                <input type="email" name="email" class="campos"  placeholder="Ingrese su email" value="">
                <input type="password" name="contrasenia" class="campos"  placeholder="Ingrese su contraseña" value="">
                <select name="rol">                    
                    <option value="0">Seleccione</option>
                    <option value="Admin">Administrador </option>
                    <option value="Visit">Visitante</option>
                </select>               
                <input type="button" id="btnCrearUsuario" name="btnCrearUsuario" value="Guardar Usuario">                
            </form>
        </div>
    </body>
</html>