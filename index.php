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
        include './includes/Clases/ClaseArticulo.php'
        ?>
        <script src="JS/scripts/index.js" type="text/javascript"></script>
        <title>Inicio</title>
    </head>
    <body>
        <h1>Menú principal</h1>
        <a href="login.php">Login</a>      
        <div id="divArticulos" class="container-fluid">     
        </div>
        
        <div id="divCarrito" class="container-fluid">
            <div><input type="button" id="btnMostrarCarrito" class="btn btn-success" value="Mostrar carrito" onclick="verCarrito"></div>
            <h3>Carrito</h3>
            
        </div>
        
    </body>
</html>
