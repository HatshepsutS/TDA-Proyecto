<?php
session_start();
if(isset($_SESSION['ID_USUARIO'])){
include_once "./php/Dashboard.php";
$sql = "SELECT * FROM usuario";
$check = mysqli_query($conexion, $sql);
$comentarios = mysqli_fetch_all($check);
$articuloPorPagina = 5;
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
    <title>Administrador</title>
    <link href="./botonflot/dist/mfb.css" rel="stylesheet">
    <script src="./botonflot/dist/mfb.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="fondo dios">
  <section>
    <div class="container-fluid">
      <nav class="navbar navbar-dark">
          <div class="container-fluid">
              <a class="navbar-brand ml-md-auto" href="#">
              <img src="./img2/logo-poli-blanco.png" alt="" width="30" height="40" class="d-inline-block align-text-top">
              <img src="./img2/logoESCOMBlanco.png   " alt="" width="40" height="40" class="d-inline-block align-text-top">
              <a href="https://www.escom.ipn.mx" class="nav-item nav-link ml-auto escom">ESCOM</a>
              </a>
          </div>
      </nav> 
  </div> 
  <header class=" row lineagris g-0 p-10 mb-4 ">
      <div class="col-9 ">
          <h1 class="titulo3 px-lg-4 pt-lg-2 pb-lg-">Encuesta a alumnos sobre la percepción de sus Clases Semestre 2021-2022</h1>
      </div>
  </header>
  <div class=" px-lg-4 pt-lg p-2">
    <h1 class="titulo4">Bienvenido <?php echo $nombreAdmin;?></h1>
  </div>
<main>
  <div class=" container-xl rectangulo2  px-lg-3 pt-lg-3 pb-lg-3 mb-4 ">
    <div class="row ">
      <div class="col-sm-12 text-center col-md-4">
      <h1 class="titulo7 px-lg-5 mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-speedometer2 mb-2" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
      </svg>   Dashboard</h1>
    </div>
    </div>

    <div class="row  px-lg-4 gx-5">
      <div class="col-sm-12 px-lg-5 col-md-4 rectanguloAzul  px-lg-5 mb-2 text-center">
        <h1 class="titulo4 pt-lg-3 "> Total de alumnos inscritos (Semestre 2022/1):</h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-people-fill titulo4" viewBox="0 0 16 16">
          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
          <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
        </svg>
        <h1 class="titulo6 pb-lg-1 ">1231</h1>
      </div>

      <div class="col-sm-12 col-md-8 mb-4">
        <h1 class="titulo3">Preguntas</h1>
        <p class=" ">P1 -¿Cómo consideras que ha sido la impartición de los temas de tu clase?
          <br/>P2-¿Cómo consideras que se han atendido las preguntas que han planteado al docente?
          <br/>P3-¿Cómo consideras que ha sido el seguimiento del docente a tus tareas, examenes, proyectos, prácticas, etc?
          <br/>P4- ¿Las sesiones de tu clse se han impartido en los horarios oficiales y con la duración establecida?
          <br/>P5-¿Cómo consideras que se han tendido las distintas problemáticas relacionadas con tu clase?</p>
      </div>
    </div>
  </div>

  <div class="container-xl rectangulo2 px-lg-3 pt-lg-3 pb-lg-3 mb-4 ">
    <div class="row">
      <div class="col-sm-12 text-center col-md-4">
        <h1 class="titulo7 px-lg-5 mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
        </svg>   Periodo 1</h1>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-5 col-sm-12">
        <h1 class="titulo5 px-lg-4"> Total de encuestas  realizadas: <?php echo($numDatos);?></h1>
        <canvas id="myChart"></canvas>
          <script>
            
const data = {
    labels: [
      'P1',
      'P2',
      'P3',
      'P4',
      'P5'
    ],
    datasets: [{
      data: [<?php echo $porcentajeP1[1]?>, <?php echo $porcentajeP1[2]?>, <?php echo $porcentajeP1[3]?>, <?php echo $porcentajeP1[4]?>,<?php echo $porcentajeP1[5]?>],
      backgroundColor: [
        '#0771D3',
        '#1CCAD8',
        '#0CF574',
        '#F1BE42',
        '#5185EC'
      ],
      hoverOffset: 4
    }]
  };

  const config = {
    type: 'doughnut',
    data: data,
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
          </script>
      </div>
      <div class="col-md-7 col-sm-12 text-center ">
        <canvas id="myChart2"></canvas>
        <script src="./js/Administrador2.js"></script>
      <div class="col-sm-12 p-5">  
        <table class="table table-light ">
          <thead>
            <tr>
              <th scope="col">Pregunta</th>
              <th scope="col">P1</th>
              <th scope="col">P2</th>
              <th scope="col">P3</th>
              <th scope="col">P4</th>
              <th scope="col">P5</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Resultados</th>
              <td><?php echo $porcentajeP1[1]?></td>
              <td><?php echo $porcentajeP1[2]?></td>
              <td><?php echo $porcentajeP1[3]?></td>
              <td><?php echo $porcentajeP1[4]?></td>
              <td><?php echo $porcentajeP1[5]?></td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>

  <div class="container-xl rectangulo2 px-lg-3 pt-lg-3 pb-lg-3 mb-3 ">
    <div class="row text-center">
      <div class="col-sm-12 text-center col-md-4">
        <h1 class="titulo7 px-lg-5 mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
          <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
        </svg>   Comentarios</h1>
      </div>
      <div class=" col-12 text-center align-self-center cuadroOscurito ">
        <!--<h1>Paginación</h1>-->
        <?php
        if(!$_GET){
          echo "<script>location.href='IndexDashboard.php?pagina=1';</script>";
        }
        if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
          echo "<script>location.href='IndexDashboard.php?pagina=1';</script>";
        }

        $iniciar = ($_GET['pagina']-1)*$articuloPorPagina;
        $sql_articulos ='SELECT COMENTARIO FROM usuario LIMIT :iniciar, :narticulos';
        $sentencia = $pdo->prepare($sql_articulos);
        $sentencia->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
        $sentencia->bindParam(':narticulos',$articuloPorPagina, PDO::PARAM_INT);
        $sentencia->execute();
        $comentariosLim = $sentencia->fetchAll();
        ?>

        <?php foreach($comentariosLim as $comentario): ?>
        <div class="alert alert-primary" role="alert">
          <?php echo $comentario[0]?>
        </div>
        <?php endforeach?>
      </div>

      <div class = "row">
        <div class = "container col-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center"><li class="page-item disabled">
                <li class="page-item <?php echo $_GET['pagina']==1?'disabled':'' ?>"><a class="page-link" href="IndexDashboard.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
                  <?php $auxiliar = $paginas>5?5:$paginas; for($i=0;$i<$auxiliar-1;$i++): ?>
                  <li class="page-item <?php echo $_GET['pagina'] == $i+1 ? 'active': '' ?>"><a class="page-link" href="IndexDashboard.php?pagina=<?php echo $i+1;?>">
                      <?php echo $i+1;?>
                  </a></li>
                  <?php endfor ?>
                  <li class="page-item disabled"><a class="page-link">...</a></li>
                  
                  <li class="page-item <?php echo $_GET['pagina'] == $i+1 ? 'active': '' ?>"><a class="page-link" href="IndexDashboard.php?pagina=<?php echo $i+$paginas-4;?>">
                  <?php echo $i+$paginas-4;?>

                  <li class="page-item <?php echo $_GET['pagina']>=$paginas?'disabled':'' ?>"><a class="page-link" href="IndexDashboard.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
                </ul>
              </nav>
        </div>
</div>

    </div>
  </div>



</main>



</section>
<section> <!--Botón flotante-->>
    <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
        <li class="mfb-component__wrap">
          <a href="#" class="mfb-component__button--main">
            <i class="mfb-component__main-icon--resting ion-plus-round"></i>
            <i class="mfb-component__main-icon--active ion-close-round"></i>
          </a>
          <ul class="mfb-component__list">
            <li>
              <a href="./UnidadesAprendizaje.php" data-mfb-label="U.A." class="mfb-component__button--child">
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