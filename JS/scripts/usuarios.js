$(function () {

    $("#btnCrearUsuario").click(function () {
        $_form = $("#frmCrearUsuario");

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'procesadatos.php',
            data: $_form.serialize() + "&accion=crea-usuario",
            success: function (_data) {
                if (_data.valido) {
                    alert("El usuario se insertó correctamente.|");
                    $(".campos").val("");
                } else {
                    alert("Problemas al insertar el usuario.");
                }
            }
        });//Fin ajax

    });//Fin click btnLogin

    $("#btnBuscaUsuario").click(function () {
        $_form = $("#frmBuscaUsuario");

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'procesadatos.php',
            data: $_form.serialize() + "&accion=busca-usuario",
            success: function (_data) {
                if (_data.valido) {
                   $_html = '<form id="frmEliminarUsusario" name="frmEliminarUsusario" method="post" >';                       
                   $_html += '<p><input type="text" name="cedula" class="campos" placeholder="Ingrese la cedula" value="'+_data.datos.Cedula+'" disabled></p>';
                   $_html += '<p><input type="text" name="nombre" class="campos" value="'+_data.datos.Nombre+'"disabled></p> ';
                   $_html += '<p><input type="text" name="apellidos" class="campos"  value="'+_data.datos.Apellidos+'"disabled></p>';
                   $_html += '<p><input type="email" name="email" class="campos"  value="'+_data.datos.Email+'"disabled></p>';
                     $_html += '<p><select name="rol" disabled>';                    
                     $_html += '<option value="0">Seleccione</option>';
                     $_html += '<option value="Admin">Administrador </option>';
                     $_html += '<option value="Visit">Visitante</option>';
                   $_html += '</select></p>';               
                   $_html += '<p><input type="button" id="btnEliminar" name="btnEliminar" value="Eliminar Usuario"></p>';                
                   $_html += '</form>';
                   $("#contenedor").append($_html);
                } else {
                  
                }
            }
        });//Fin ajax

    });//Fin click btnLogin

});//Fin script