
$(document).ready(()=>{
  $("#login_submit").click(function(){//El error está aqui
    
    var ID_USUARIO=$("#ID_USUARIO").val();
    var Contrasena=$("#Contrasena").val();

    $.ajax({
      type:"POST",
      url:"./php/login.php",
      data:{ID_USUARIO:ID_USUARIO, Contrasena:Contrasena},
      cache:false,
      success:(respAX) => {
          alert(respAX);
      }
      });
    });
});
