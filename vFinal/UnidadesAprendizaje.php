<?php
session_start();
if(isset($_SESSION['ID_USUARIO'])){

$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
/*
$server='localhost';
$user='root';
$pass='2.71828';
$db='encuesta';
*/
$conexion=new mysqli($server,$user,$pass,$db);
$pdo = new PDO('mysql:host=25.84.113.73; dbname=encuesta', $user, $pass);
$sql = "SELECT * FROM materia_nomb";
$check = mysqli_query($conexion, $sql);
$comentarios = mysqli_fetch_all($check);
$articuloPorPagina = 4;
$numDatos = count($comentarios);
$paginas = ceil($numDatos/$articuloPorPagina);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <title>Prueba</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link href="./botonflot/dist/mfb.css" rel="stylesheet">
    <script src="./botonflot/dist/mfb.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="fondo avemaria">
  <section>
    <div class="container-fluid">
      <nav class="navbar navbar-dark">
          <div class="container-fluid">
              <a class="navbar-brand ml-md-auto" href="#">
              <img src="./img2/logo-poli-blanco.png" alt="" width="30" height="40" class="d-inline-block align-text-top">
              <img src="./img2/logoESCOMBlanco.png   " alt="" width="40" height="40" class="d-inline-block align-text-top">
              <a href="https://www.escom.ipn.mx" class="nav-item nav-link ml-auto escom1">ESCOM</a>
              </a>
          </div>
      </nav> 
  </div> 
  <header class=" row lineagris g-0 p-10 mb-2 ">
      <div class="col-9 ">
          <h1 class="titulo3 px-lg-4 pt-lg-2 pb-lg-">Encuesta a alumnos sobre la percepción de sus Clases Semestre 2021-2022</h1>
      </div>
  </header>
  <div class=" px-lg-4 pt-lg ">
    <div class="col-sm-12 text-center col-md-6">
      <h1 class="titulo6 px-lg-5 mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="
      " viewBox="0 0 16 16">
        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
      </svg>   Unidades de Aprendizaje</h1>
    </div>
  </div>
<main>


  <div class="container-xl rectangulo2 px-lg-3 pt-lg-3 pb-lg-3 mb-3 ">
    <div class="row mb-1"><br></div>
    <div class="row text-center">
      <div class="col-md-12  px-lg-5 pt-lg-2 pb-lg-3 ">
      <form class="d-flex">
        <input class="form-control me-2 bordeazul" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-primary botonbuscar" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search " viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button> 
      </form>
      </div>
    </div>
    
    
    <div class="row text-center">
      
    <div class=" col-12 text-center align-self-center cuadroOscurito ">
        <!--<h1>Paginación</h1>-->
        <?php
        if(!$_GET){
          echo "<script>location.href='UnidadesAprendizaje.php?pagina=1';</script>";
        }
        if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
          echo "<script>location.href='UnidadesAprendizaje.php?pagina=1';</script>";
        }

        $iniciar = ($_GET['pagina']-1)*$articuloPorPagina;
        $sql_articulos ='SELECT * FROM materia_nomb LIMIT :iniciar, :narticulos';
        $sentencia = $pdo->prepare($sql_articulos);
        $sentencia->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
        $sentencia->bindParam(':narticulos',$articuloPorPagina, PDO::PARAM_INT);
        $sentencia->execute();
        $comentariosLim = $sentencia->fetchAll();
        ?>

        <?php foreach($comentariosLim as $comentario): ?>
        <div class="alert alert-primary" role="alert">
            <div class = "row">
            <div class="col-sm">
            <?php echo $comentario[0]?>
              </div>
            <div class="col-sm">
            <?php echo $comentario[1]?>
              </div>
              <div class="col-sm">
              <a href="./Materia.php?materia=<?php echo $comentario[1]?>"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
              </svg></a> 
              <a href="./Materia.php?materia=<?php echo $comentario[1]?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
              <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
              </svg>
              </a><!-- AQUI ------------------------------------->
              </div>
              </div>
        </div>
        <?php endforeach?>
      </div>

      <div class = "row">
        <div class = "container col-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center"><li class="page-item disabled">
                <li class="page-item <?php echo $_GET['pagina']==1?'disabled':'' ?>"><a class="page-link" href="UnidadesAprendizaje.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
                  <?php $auxiliar = $paginas>5?5:$paginas; for($i=0;$i<$auxiliar-1;$i++): ?>
                  <li class="page-item <?php echo $_GET['pagina'] == $i+1 ? 'active': '' ?>"><a class="page-link" href="UnidadesAprendizaje.php?pagina=<?php echo $i+1;?>">
                      <?php echo $i+1;?>
                  </a></li>
                  <?php endfor ?>
                  <li class="page-item disabled"><a class="page-link">...</a></li>
                  <li class="page-item <?php echo $_GET['pagina'] == $i+3 ? 'active': '' ?>"><a class="page-link" href="UnidadesAprendizaje.php?pagina=<?php echo $i+$paginas-4;?>">
                  <?php echo $i+$paginas-4;?>
                  <li class="page-item <?php echo $_GET['pagina']>=$paginas?'disabled':'' ?>"><a class="page-link" href="UnidadesAprendizaje.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
                </ul>
              </nav>
        </div>
</div>
    </div>
  </div>
</main>

</section>
    <section> <!--Botón flotante-->
    <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
        <li class="mfb-component__wrap">
          <a href="#" class="mfb-component__button--main">
            <i class="mfb-component__main-icon--resting ion-plus-round"></i>
            <i class="mfb-component__main-icon--active ion-close-round"></i>
          </a>
          <ul class="mfb-component__list">
            <li>
              <a href="./IndexDashboard.php" data-mfb-label="Dashboard" class="mfb-component__button--child">
                <i class="mfb-component__child-icon ion-speedometer"></i>
              </a>
            </li>
            <li>
              <a href="./Index.html" data-mfb-label="Salir" class="mfb-component__button--child">
                <i class="bi bi-arrow-up-left-circle"></i>
                <i class="mfb-component__child-icon ion-android-exit"></i>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </section>
      <script src="css/js/bootstrap.bundle.min.js"></script> 
</body>
</html>

<?php 
}
else{
  header("location: ./Index.html");
}
?>