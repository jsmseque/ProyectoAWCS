
$(function () {

    //evento , cargar la pagina
    $(window).load(function () {
        $.ajax({  
            dataType: 'json',
            url: "includes/procesa-catalogo.php",
            method: "post",
            success: function (_data) {


                for (var articulo in _data) {                     
                   $catalogo='<div class="col-sm-4">';
                   $catalogo += '<img id="img-muestra" src="imagenes/articulos/' + _data[articulo].Imagen+ '" alt="Imagen del celular" class="img-rounded" >';
                   $catalogo += "<div><b>Marca:</b>" + _data[articulo].Marca + "</div>";
                   $catalogo += "<div><b>Modelo:</b>" + _data[articulo].Modelo + "</div>";
                   $catalogo += "<div><b>Detalle:</b>" + _data[articulo].Detalle + "</div>";
                   $catalogo += "<div><b>Precio: ¢</b>" + _data[articulo].Precio + "</div>";
                   $catalogo += '<div><input type="button" id="btnCarrito" class="btn btn-success" value="Añadir al carrito"></div>';
                   $catalogo += '</div>';
                   $("#divArticulos").append($catalogo);
                     
                }

               
//                
                
//                     
//                   $_html = '<form id="frmEliminarUsusario" name="frmEliminarUsusario" method="post" >';                       
//                   $_html += '<p><input type="text" name="cedula" class="campos" placeholder="Ingrese la cedula" value="'+_data.datos.Cedula+'" disabled></p>';
//                   $_html += '<p><input type="text" name="nombre" class="campos" value="'+_data.datos.Nombre+'"disabled></p> ';
//                   $_html += '<p><input type="text" name="apellidos" class="campos"  value="'+_data.datos.Apellidos+'"disabled></p>';
//                   $_html += '<p><input type="email" name="email" class="campos"  value="'+_data.datos.Email+'"disabled></p>';
//                   $_html += '<p><select name="rol" disabled>';                    
//                   $_html += '<option value="0">Seleccione</option>';
//                   $_html += '<option value="Admin">Administrador </option>';
//                   $_html += '<option value="Visit">Visitante</option>';
//                   $_html += '</select></p>';               
//                   $_html += '<p><input type="button" id="btnEliminar" name="btnEliminar" value="Eliminar Usuario"></p>';                
//                   $_html += '</form>';
//                   $("#divArticulos").append($_html);         
                        
            }
        });

    });





});//fin de script






