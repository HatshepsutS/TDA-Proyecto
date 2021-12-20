
<?php
session_start();


$ID_USUARIO = $_SESSION['ID_USUARIO'];
if(isset($_SESSION['ID_USUARIO'])){



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ya respondiste</title>
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link href="./botonflot/dist/mfb.css" rel="stylesheet">
    <script src="./botonflot/dist/mfb.js"></script>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body class="fondo dios">
    <section>
        <div class="container-fluid">
            <nav class="navbar navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand ml-md-auto" href="#">
                    <img src="./img2/logo-poli-blanco.png" alt="" width="30" height="40" class="d-inline-block align-text-top">
                    <img src="./img2/logoESCOMBlanco.png   " alt="" width="40" height="40" class="d-inline-block align-text-top">
                    <a class="nav-item nav-link ml-auto escom">ESCOM</a>
                    </a>
                </div>
            </nav> 
        </div> 
        <header class=" row lineagris g-0 p-15 mb-4 ">
            <div class="col-9 ">
                <h1 class="titulo3 px-lg-4 pt-lg-2 pb-lg-">Encuesta a alumnos sobre la percepción de sus Clases Semestre 2021-2022</h1>
            </div>
        </header>
        <main>
            <div class="row">
                
            </div>

        <div class="container-xl g-0">
            <div class="row g-0">
            
               
                 
                <div class="col-sm-6 col-m-6  g-0 gx-0">    
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="./css/img/monita.png" class="d-block w-100" alt="...">
                      </div>
          
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-m-6 px-lg-4 py-lg-5 p-4 ">
                    <h1 class="titulo1">¡Gracias!</h1>
                    <p class="titulo4">Ya tenemos tus repuestas de la encuesta sobre la precepción de clases semestre 2021-2022
                    </p>
                    <form action="./pdfAlumno.php">
                    <button type="submit" class="btn btn-primary titulo2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" style = "margin: 10px;" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                      </svg> 
                      Descargar reporte de respuestas </button>
                      <form>
                </div>
            </div>
        </div>
    <section><!--Botón flotante-->
        <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
            <li class="mfb-component__wrap">
              <a href="#" class="mfb-component__button--main">
                <i class="mfb-component__main-icon--resting ion-plus-round"></i>
                <i class="mfb-component__main-icon--active ion-close-round"></i>
              </a>
              <ul class="mfb-component__list">
                <li>
                  <a href="./cerrarSesion.php" data-mfb-label="Salir" class="mfb-component__button--child">
                    <i class="bi bi-arrow-up-left-circle"></i>
                    <i class="mfb-component__child-icon ion-android-exit"></i>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
    </section>

    
    <script src="css/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b5e1df4d55.js" crossorigin="anonymous"></script> 
</body>
</html>

<?php
}
else {
    header("location: ./Index.html");
}

?>