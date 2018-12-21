
$(function () {

    //evento , cargar la pagina
    $(window).load(function () {
        $.ajax({  
            dataType: 'json',
            url: "includes/procesa-catalogo.php",
            method: "post",
            data: "&accion=cargar-articulos",
            success: function (_data) {
            
                
                for (var articulo in _data) {                     
                   $catalogo='<div class="col-sm-4">';
                   $catalogo += '<img id="img-muestra" src="imagenes/articulos/' + _data[articulo].Imagen+ '" alt="Imagen del celular" class="img-rounded" >';
                   $catalogo += "<div><b>Marca:</b>" + _data[articulo].Marca + "</div>";
                   $catalogo += "<div><b>Modelo:</b>" + _data[articulo].Modelo + "</div>";
                   $catalogo += "<div><b>Detalle:</b>" + _data[articulo].Detalle + "</div>";
                   $catalogo += "<div><b>Precio: ¢</b>" + _data[articulo].Precio + "</div>";                   
                   $catalogo += '<div><input type="button" id="btnCarrito" class="btn btn-success" value="Añadir al carrito" onclick="agregaCarrito( '+"'"+ _data[articulo].Codigo.toString() +"'"+  ')"></div>';
                   $catalogo += '</div>';
                   $("#divArticulos").append($catalogo);
                     
                }
                    
            }
        });

    });

$("#btnMostrarCarrito").click(function (){
    $.ajax({  
            dataType: 'json',
            url: "includes/procesa-catalogo.php",
            method: "post",
            data: "&accion=cargar-articulos",
            success: function (_data) {
    for (var i in articulosCarrito) {     
        for (var articulo in _data) {
            if(_data[articulo].Codigo== articulosCarrito[i]){
                   $catalogo='<div class="col-sm-8">';
                   $catalogo += '<img id="img-muestra" src="imagenes/articulos/' + _data[articulo].Imagen+ '" alt="Imagen del celular" class="img-rounded" >';
                   $catalogo += "<div><b>Marca:</b>" + _data[articulo].Marca + "</div>";
                   $catalogo += "<div><b>Modelo:</b>" + _data[articulo].Modelo + "</div>";
                   $catalogo += "<div><b>Detalle:</b>" + _data[articulo].Detalle + "</div>";
                   $catalogo += "<div><b>Precio: ¢</b>" + _data[articulo].Precio + "</div>";                   
                   $catalogo += '<div><input type="button" id="btnComprar" class="btn btn-success" value="Comprar"></div>';
                   $catalogo += '</div>';
                   $("#divCarrito").append($catalogo);   
                } }}
            }
                 });  
    
});




});//fin de script


//variable global arreglo para guardar carrito
articulosCarrito=[];

function agregaCarrito(a) {
    alert(a);
  articulosCarrito.push(a)
}


//function verCarrito(){
//        $.ajax({  
//            dataType: 'json',
//            url: "includes/procesa-catalogo.php",
//            method: "post",
//            data: "&accion=cargar-articulos",
//            success: function (_data) {
//    for (var i in _data) {
//        for (var articulo in articulosCarrito) {
//
//                   $catalogo='<div class="col-sm-4">';
//                   $catalogo += '<img id="img-muestra" src="imagenes/articulos/' + _data[articulo].Imagen+ '" alt="Imagen del celular" class="img-rounded" >';
//                   $catalogo += "<div><b>Marca:</b>" + _data[articulo].Marca + "</div>";
//                   $catalogo += "<div><b>Modelo:</b>" + _data[articulo].Modelo + "</div>";
//                   $catalogo += "<div><b>Detalle:</b>" + _data[articulo].Detalle + "</div>";
//                   $catalogo += "<div><b>Precio: ¢</b>" + _data[articulo].Precio + "</div>";                   
//                   $catalogo += '<div><input type="button" id="btnComprar" class="btn btn-success" value="Comprar"></div>';
//                   $catalogo += '</div>';
//                   $("#divCarrito").append($catalogo);   
//                } }
//            }
//                 });  
//}




