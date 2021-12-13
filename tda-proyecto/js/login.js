$(document).ready(()=>{
  $("#login_submit").click(function(){
    
    var ID_USUARIO=$("#ID_USUARIO").val();
    var Contrasena=$("#Contrasena").val();

    $.ajax({
      type:"POST",
      url:"./php/login.php",
      data:{ID_USUARIO:ID_USUARIO, Contrasena:Contrasena},
      cache:false,
      success:(respAX) => {
        if (respAX) {
          console.log(respAX);
          let AX = JSON.parse(respAX);
          alert(AX);
        }
      },
       error:() => {

         alert("errorr");
       }


      });


      
    } );
   
 
});












