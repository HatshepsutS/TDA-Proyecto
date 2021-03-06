<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ESCOM-Encuesta</title>
  <link rel="stylesheet" href="./css/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Raleway:wght@700&display=swap" rel="stylesheet">
  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="./Validetta/validetta.min.js"></script>
<script src="./Validetta/localization/validettaLang-es-ES.js"></script>
<link href="./js/SweetAlert/sweetalert2.css" rel="stylesheet">
<script src = "./js/SweetAlert/sweetalert2.all.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php
  if(isset($_POST['submit'])){
    echo "matenmeeeeeee";


  }

 
 ?>


</head>

<body class="fondo">
  <section>
    <div class="row g-0">
      <div class="col-lg-6 " method="post">
        <div class="px-lg-3 pt-lg-2 pb-lg-3 ">
          <img src="./img2/ipn1.png" alt="img-fluid">
          <img src="./img2/logoEscom2.png" alt="img-fluid">
        </div>
        <div class="px-lg-3 py-lg-2 p-4 order-2 order-sm-2 order-md-1">
          <h1 class="titulo1 mb-4">Encuesta a alumnos sobre la percepción de sus Clases Semestre 2021-2022 </h1>
          <div class="row cuadro1 offset-sm-2 justify-content-center align-items-center ">
            <div class="col-6 text-center">
              <h1 class="form-text prendido">Ingrese datos</h1>
            </div>
          <form class="cuadro2 p-4"  id="formLogin" name="formLogin" method="POST">
            <div class="mb-3 ">
              <label for="exampleInputEmail1" class="form-label titulo2">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-person-circle p-1" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                Usuario</label>
              <input type="text" class="form-control rec1pequeño border-0" placeholder="Ingrese su boleta"  id="ID_USUARIO" name="ID_USUARIO" aria-describedby="emailHelp" data-validetta="required,minLength[10],maxLength[10]" maxlength = "10">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label titulo2">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-lock-fill p-1" viewBox="0 0 16 16">
                  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                </svg>
                Contraseña</label>
              <input type="password" class="form-control rec1pequeño border-0" placeholder="Ingrese su contraseña" id="Contrasena" name="Contrasena" data-validetta="required,minLength[5],maxLength[15]" maxlength="15">
            </div>
            <div class="row">
                <div class="g-recaptcha" data-sitekey="6LfnnrYdAAAAAMPKry3Nf6-CiIuXGAVGEg5b2svd"></div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-lg btn-primary"  id="login_submit" name="login_submit">
                <script>

$(document).ready(()=>{
    $("form#formLogin").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:(e)=>{
            e.preventDefault();
            var ID_USUARIO=$("#ID_USUARIO").val();
                    var Contrasena=$("#Contrasena").val();
                    $.ajax({
                      type:"POST",
                      url:"./php/login.php",
                      data:{ID_USUARIO:ID_USUARIO, Contrasena:Contrasena},
                      cache:false,
                      success:(respAX) => {
                        let AX = JSON.parse(respAX);
                        
                        if(AX.cod == 1){
                          Swal.fire({
                            title: 'Bien!',
                            text: AX['msj'],
                            icon: 'success',
                            confirmButtonText: 'Continuar',
                            timer:3000,
                            didDestroy:()=>{
                        window.location.href = "./EncuestaUsuario.php";
                      }
                          
                          })
                          
                    }
                    else if(AX.cod == 2){
                      Swal.fire({
                        title: 'Bien!',
                        text: AX['msj'],
                        icon: 'info',
                        confirmButtonText: 'Continuar',
                        timer:3000,
                        didDestroy:()=>{
                        window.location.href = "./IndexDashboard.php";
                      }
                      })
                    }
                    else if(AX.cod == 3){
                      Swal.fire({
                        title: 'Bien!',
                        text: AX['msj'],
                        icon: 'info',
                        confirmButtonText: 'Continuar',
                        timer:3000,
                        didDestroy:()=>{
                        window.location.href = "./DespedidaUsuario.html";
                      }
                        
                      })
                    }
                    else{
                      Swal.fire({
                        title: 'Error!',
                        text: AX['msj'],
                        icon: 'error',
                        confirmButtonText: 'Continuar',
                        timer:3000

                      })
                    }
                      }
                      });
        }
    })
});
                  </script>
                Ingresar
                <svg xmlns="http://www.w3.org/2000/svg" width="35 " height="35" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
              </button>
            </div>
          </form>
        </div>
        </div>

      </div>
      <div class="col-lg-6 order-1 order-sm-1 order-md-2">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./img2/Recurso 9yanopuedo.png" class="d-block w-100" alt="...">
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <script src="css/js/bootstrap.bundle.min.js"></script>

 

</body>
</html>