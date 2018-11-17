<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Inicie sesión</h1>
        <div class="contenedor-login">      
            <form name="frmLogin" method="post" action="includes/procesadatos.php">
                <div class="form-row">
                    <div class="form-group col-md-2"> 
                        <label for="cedula">Cédula</label>
                        <input type="text" name="cedula" placeholder="Cedula" value="" id="cedula" class="form-control">
                    </div>
                    <div class="form-group col-md-2"> 
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" placeholder="Password" value="" id="password" class="form-control">
                    </div>
                    <input type="hidden" name="accion" value="login">
                </div>
                <div class="col-sm-10">
                <input type="submit" name="btnLogin" value="Ingresar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </body>
</html>