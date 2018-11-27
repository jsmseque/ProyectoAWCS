$(function(){
   
   //evento , cargar la pagina
   $( window ).load(function(){
        $("#alerta").hide(); 
   });
    
    
     //evendo cambios en el input imagen de producto	
        $("#imagen").change(function() {
                        tamanoMaxImg=500000;

			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/png"];	
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]
                                ))||file.size >= tamanoMaxImg)
			{
			$('#img-muestra').attr('src','imagenes/articulos/default.png');
                        $("#imagen").attr('url','Archivo no válido!!');
                        $("#imagen").css("color","red");
                        $("#alerta").fadeIn("slow");     
                        $('#enviar').attr('disabled',true);                       
			return false;
			}
            else
			{
                var reader = new FileReader();	
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                
            }		
        });
        
        //funcion mostrar imagen seleccionada
    function imageIsLoaded(e) { 
        $("#imagen").css("color", "green");
        $('#img-muestra').attr('src', e.target.result);
        $('#enviar').attr('disabled', false);
         $("#alerta").fadeOut("slow"); 
    };
    
    
    
    
    
//    
//    //Captura el evento click
////$("#btnIngresa").click(function(){
//   
//    
//    //no se usa
////    $_form= $("#frmNuevoArticulo");
////   $.ajax({
////       type: 'post',
////       dataType: 'json',
////        url: 'includes/procesadatos.php',
////       data: $_form.serialize() + "&accion=ingresa-articulo",
////       success: function (_data){
////       if (_data.valido){
////           window.location.replace("index.php");
////       }else{
////  
////         alert("Problema al ingresar el articulo.");
////       }       
////       }    
//
////   });//Fin ajax
////    
////});//Fin click btnIngresa
//    
//   

});//fin de script

