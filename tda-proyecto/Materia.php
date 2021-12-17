<?php
session_start();
if(isset($_SESSION['ID_USUARIO'])){
$NOMBRE_MATERIA = $_REQUEST['materia'];
include_once "./php/MateriaAux.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <title>Materia</title>
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
  <div class="col-sm-12 text-center col-md-6">
<h1 style="color:white; font-family: Raleway; font-size: 50px;"><?php echo $NOMBRE_MATERIA; ?></h1>
</div>
<main>


  <div class="container-xl rectangulo3 px-lg-3 pt-lg-3 pb-lg-3 mb-2 ">
    <div class="row mb-1"><br></div>
    
    
    
    <div class="row text-center">
      
      <div class=" col-12 text-center align-self-center lol px-lg-0 pt-lg-0 ">
        <ul class="tabs">
          <li class="active titulo8">General</li>
          <li class="titulo8">Grupos</li> 
        </ul>

        <ul class="tab__content">
          <li class="active">
            <div class="content__wrapper">
                
              <div class="row">
                  
                <div class="col-md-5 col-sm-12">
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
                      <tr> <!--Recibir el grupo individual por medio de session-->
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
          </li>
          <li>
            <div class="content__wrapper">
              <div class="row text-center">
              <div class="col-sm-12 p-5">  
                  <table class="table table-light ">
                    <thead>
                      <tr> <!--Recibir el grupo individual por medio de session-->
                        <th scope="col"><p style="color:#0771D3;">Grupo</p></th>
                        <th scope="col"><p style="color:#0771D3;">P1</p></th>
                        <th scope="col"><p style="color:#0771D3;">P2</p></th>
                        <th scope="col"><p style="color:#0771D3;">P3</p></th>
                        <th scope="col"><p style="color:#0771D3;">P4</p></th>
                        <th scope="col"><p style="color:#0771D3;">P5</p></th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $sqlGrupo = "SELECT GRUPO FROM materia WHERE ID_MATERIA = '$busqAux'"; //Poner parámetro de por materia
                    $checkGrupo = mysqli_query($conexion, $sqlGrupo);
                    $GrupoAux = mysqli_fetch_all($checkGrupo);
                    foreach($GrupoAux as $GrupoA){
                        echo "<tr>";
                        foreach($GrupoA as $Grupo){
                            echo "<th>$Grupo</th>";
                    for($auxGlob = 1; $auxGlob<=5; $auxGlob++){
                        //Problema abajo////////////////////////////////////////////
                        
                        //$sqlPreguntas = "SELECT distinct a.grupo, a.ID_MATERIA, b.MUY_SATISFECHO, b.SATISFECHO, b.NO_ME_QUEJO, b.POCO_SATISFECHO, b.NADA_SATISFECHO from materia a inner join encuesta b ON a.ID_MATERIA = b.ID_MATERIA";
                        $sqlPreguntas = "SELECT ID_MATERIA, ID_PREGUNTA, MUY_SATISFECHO, SATISFECHO, NO_ME_QUEJO, POCO_SATISFECHO, NADA_SATISFECHO FROM encuesta WHERE GRUPO = '$Grupo' AND ID_PREGUNTA = $auxGlob AND ID_MATERIA = '$busqAux'";
                        $checkPreguntas = mysqli_query($conexion, $sqlPreguntas);
                        $preguntas = mysqli_fetch_all($checkPreguntas);

                        $digito = 5;
                        $sumaP1 = 0;
                        for($i=2;$i<=6;$i++){
                            $auxiliarPregunta = 0;
                            foreach($preguntas as $pregunta){
                                $auxiliarPregunta += $pregunta[$i]*$digito;
                            }
                            $sumaP1 += $auxiliarPregunta;
                            $digito--;
                        }
                        $Auxiliar = round((($sumaP1) / 5)/5,2);
                        echo "<td>$Auxiliar</td>";
                        }
                    }
                    echo "</tr>";
                    }
                    
                    ?>
                    </tbody>
                  </table>
                </div>
                
          




          </div>
            </div>
          </li>
          
        </ul>

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
      <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
      <script>
        $(document).ready(function(){
  
  var clickedTab = $(".tabs > .active");
  var tabWrapper = $(".tab__content");
  var activeTab = tabWrapper.find(".active");
  var activeTabHeight = activeTab.outerHeight();
  
  // Show tab on page load
  activeTab.show();
  
  // Set height of wrapper on page load
  tabWrapper.height(activeTabHeight);
  
  $(".tabs > li").on("click", function() {
    
    // Remove class from active tab
    $(".tabs > li").removeClass("active");
    
    // Add class active to clicked tab
    $(this).addClass("active");
    
    // Up<a href="https://www.jqueryscript.net/time-clock/">date</a> clickedTab variable
    clickedTab = $(".tabs .active");
    
    // fade out active tab
    activeTab.fadeOut(250, function() {
      
      // Remove active class all tabs
      $(".tab__content > li").removeClass("active");
      
      // Get index of clicked tab
      var clickedTabIndex = clickedTab.index();

      // Add class active to corresponding tab
      $(".tab__content > li").eq(clickedTabIndex).addClass("active");
      
      // update new active tab
      activeTab = $(".tab__content > .active");
      
      // Update variable
      activeTabHeight = activeTab.outerHeight();
      
      // Animate height of wrapper to new tab height
      tabWrapper.stop().delay(50).animate({
        height: activeTabHeight
      }, 500, function() {
        
        // Fade in active tab
        activeTab.delay(50).fadeIn(250);
        
      });
    });
  });
  
  
});
</script>
</body>
</html>

<?php 
}
else{
  header("location: ./Index.html");
}
?>