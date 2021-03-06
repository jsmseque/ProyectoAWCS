                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
<html>
    <head>
        <?php
        include './referencias.html';
        include './ValidaAcceso.php';
        ?>
        <script src="JS/scripts/ingresar-articulo.js" type="text/javascript"></script>  
        <link href="css/ingresar-articulo.css" rel="stylesheet" type="text/css"/>
        <title>Ingresar articulos</title>
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
        <div id="titulo-principal" class="container-fluid"> 
            <h1>Agregar artículos al catálogo</h1>
        </div>
        <div  class="container-fluid">
            <div class="panel panel-primary" >              
                <div class="panel-heading">
                    <h2 id="titulo-panel" class="panel-title">Datos de articulo</h2>
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" name="frmNuevoArticulo" method="post" id="frmNuevoArticulo" action="includes/procesadatos.php">
                        <div class="form-row">
                            <div class="form-group col-md-6"> 
                                <label for="codigo">Código</label>
                                <input type="text" name="codigo" placeholder="Código" value="" id="codigo" class="form-control">
                            </div>
                             <div class="form-group col-md-6"> 
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" placeholder="Marca" value="" id="marca" class="form-control">
                            </div>   
                            <div class="form-group col-md-6"> 
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" placeholder="Modelo" value="" id="modelo" class="form-control">
                            </div>
                            <div class="form-group col-md-6"> 
                                <label for="detalle">Detalle</label>
                                <input type="text" name="detalle" placeholder="Detalle" value="" id="detalle" class="form-control">
                            </div>
                            <div class="form-group col-md-6"> 
                                <label for="precio">Precio</label>
                                <input type="text" name="precio" placeholder="Precio" value="" id="precio" class="form-control">
                            </div>
                            <div class="form-group col-md-6"> 
                                <label for="cantidad">Cantidad</label>
                                <input type="text" name="cantidad" placeholder="Cantidad" value="" id="cantidad" class="form-control">
                            </div>
                            <div class="form-group col-md-6"> 
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" value="" id="imagen" class="form-row">
                                <img id="img-muestra" src="imagenes/articulos/default.png" alt="Imagen del celular" class="img-rounded" >                     
                                <div  id="alerta" class="alert alert-warning" role="alert" style="width: 200px">
                                    Ingrese una imagen en formato correcto!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" name="accion" value="ingresa-articulo">
                            <input id="enviar" type="submit" name="btnIngresa" value="Ingresar" class="btn btn-primary" id="btnIngresa">
                        </div>
                    </form>
                </div>
            </div>
        </div>         
    </body>
</html>
