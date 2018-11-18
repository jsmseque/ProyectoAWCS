$(function(){

//Captura el evento click
$("#btnLogin").click(function(){
   $_form= $("#frmLogin");
   $.ajax({
       type: 'post',
       dataType: 'json',
        url: 'includes/procesadatos.php',
       data: $_form.serialize() + "&accion=login",
       success: function (_data){
       if (_data.valido){
           window.location.replace("index.php");
       }else{
  
         alert("Usario y/o contraseña incorrectos.");
       }       
       }      
   });//Fin ajax
    
});//Fin click btnLogin
    
    
});//Fin scripts