<!DOCTYPE html>
<html>
    <head>
        <?php
        include './referencias.html';
        ?>
        <script src="JS/scripts/login.js" type="text/javascript"></script>  
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
    </head>
    <body>
        <div id="titulo-principal" class="container-fluid"> 
            <h1 class="h1">Inicie sesión</h1></div>
        <div  class="container-fluid">
            <div class="panel panel-primary" >              
                <div class="panel-heading">
                    <h2 id="titulo-panel" class="panel-title">Ingrese sus datos</h2>
                </div>
                <div class="panel-body">
                    <form name="frmLogin" method="post" id="frmLogin">
                        <div class="form-row">
                            <div class="form-group col-md-6"> 
                                <label for="cedula">Cédula</label>
                                <input type="text" name="cedula" placeholder="Cedula" value="" id="cedula" class="form-control">
                            </div>
                            <div class="form-group col-md-6"> 
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" placeholder="Password" value="" id="password" class="form-control">
                            </div>                         
                        </div>
                        <div class="col-sm-10">
                            <input type="button" name="btnLogin" value="Ingresar" class="btn btn-primary" id="btnLogin">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>