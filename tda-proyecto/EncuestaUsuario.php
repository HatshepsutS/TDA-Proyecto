
<?php
session_start();


$ID_USUARIO = $_SESSION['ID_USUARIO'];
if(isset($_SESSION['ID_USUARIO'])){
 include_once "./php/conexion.php";
 $sql = "SELECT nombre FROM usuario  WHERE id_usuario ='$ID_USUARIO'";
 $check = mysqli_query($conexion, $sql); 

 $queryMaterias = "select DISTINCT a.NOMBRE_MATERIA, b.grupo from materia_nomb a  inner join inscrito b on a.ID_Materia=b.ID_Materia where ID_usuario='$ID_USUARIO'"; 
 $check2 = mysqli_query($conexion, $queryMaterias); 
 $nombre = mysqli_fetch_row($check);

 


 function tabla($ID_USUARIO,$conexion,$ntabla)
{

    $queryMaterias = "select DISTINCT a.NOMBRE_MATERIA, b.grupo from materia_nomb a  inner join inscrito b on a.ID_Materia=b.ID_Materia where ID_usuario='$ID_USUARIO'"; 
    $check2 = mysqli_query($conexion, $queryMaterias); 
    $j=0;
    
    if (mysqli_num_rows($check2) > 0) {
        
        while($row = mysqli_fetch_assoc($check2)) {
        $j=$j+1;
         echo  "<tr><th scope='row'>".$row["NOMBRE_MATERIA"]. "</th><td>" . $row["grupo"].   "</td><td>
         <fieldset class='rating' required>
         <input type='radio' id='5.$j.$ntabla' name='$j.$ntabla' value='5' />
         <label for='5.$j.$ntabla'>5 stars</label>
         <input type='radio'id='4.$j.$ntabla' name='$j.$ntabla' value='4' />
         <label for='4.$j.$ntabla'>4 stars</label>
         <input type='radio' id='3.$j.$ntabla' name='$j.$ntabla' value='3' />
         <label for='3.$j.$ntabla'>3 stars</label>
         <input type='radio' id='2.$j.$ntabla' name='$j.$ntabla' value='2' />
         <label for='2'>2 stars</label>
           <input type='radio' id='1.$j.$ntabla' name='$j.$ntabla' value='1' />
          <label for='1.$j.$ntabla'>1 star</label>
          </fieldset>
              </td></tr>";
             
             }
          
            } 
  
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Usuario</title>
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
  <link href="./js/SweetAlert/sweetalert2.css" rel="stylesheet">
<script src = "./js/SweetAlert/sweetalert2.all.min.js"></script>
<script src="./js/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="./css/estrellitas.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link href="./botonflot/dist/mfb.css" rel="stylesheet">
    <script src="./botonflot/dist/mfb.js"></script>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
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
        <header class=" row lineagris g-0 p-15  ">
            <div class="col-9 ">
                <h1 class="titulo3 px-lg-4 pt-lg-2 pb-lg-">Encuesta a alumnos sobre la percepción de sus Clases Semestre 2021-2022</h1>
            </div>
        </header>
        <main>
        <div class=" px-lg-4 pt-lg-2">
            <h1 class="titulo4">Bienvenido <?php echo $nombre[0] ?></h1>
        </div>
        <div class="container rectangulo1 text-center mb-4">
            <p class="texto-sombra pt-lg-1 ">Estimado estudiante. En la ESCOM queremos saber tu opinion sobre las clases que has tenido hasta el momento en este semestre 2021-2022</p>
            <p class="texto-sombra pb-lg-2">Porfavor, toma tu tiempo para responder las siguentes preguntas sobre cada una de las unidades de aprendizaje que tienes inscritas, considerando que la carita feliz de la derecha es la más satisf actoria y la carita triste de la izquiera es menos satisfactoria</p>
        </div>
        <div class=" container-xl rectangulo2   text-center px-lg-3 pt-lg-4 pb-lg-3 mb-4 ">
            <h1 class="titulo5 mb-3">1. ¿Cómo consideras que ha sido la impartición de los temas de tu clase?</h1>
            
<?php

$ca=mysqli_num_rows($check2)*5;
           echo"<input id='cantidades' name='cantidades' type='hidden' value='$ca'>";
            
            ?>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Unidad de Aprendizaje</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nivel de satisfacción</th>

                  </tr>
                </thead>
                <tbody>
                    
                  <?php 
               
                   tabla($ID_USUARIO,$conexion,1);
                    
                 ?>
                </tbody>
              </table>
        </div>
        

        <div class="container rectangulo2 text-center px-lg-3 pt-lg-4 pb-lg-3 mb-4">
            <div class="row">
                <div class="col">
                    <h1 class="titulo5 mb-3">2. ¿Cómo consideras que se han atendido las preguntas que han planteado al docente?</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Unidad de Aprendizaje</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nivel de satisfacción</th>

                  </tr>
                </thead>
                <tbody>
                <?php 
               tabla($ID_USUARIO,$conexion,2);
          
                   
                ?>
               </tbody>
                </tbody>
              </table>
                </div>
            </div>
        </div>
        <div class="container rectangulo2 text-center px-lg-3 pt-lg-4 pb-lg-3 mb-4">
            <div class="row">
                <div class="col">
                    <h1 class="titulo5 mb-3">3.¿Cómo consideras que ha sido el seguimiento del docente a tus tareas, examenes, proyectos, prácticas, etc?</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Unidad de Aprendizaje</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nivel de satisfacción</th>

                  </tr>
                </thead>
                <tbody>
                <?php 
                  tabla($ID_USUARIO,$conexion,3);
             
                ?>
               </tbody>
                </tbody>
              </table>
                </div>
            </div>
        </div>
       <div class="container rectangulo2 text-center px-lg-3 pt-lg-4 pb-lg-3 mb-4">
            <div class="row">
                <div class="col">
                    <h1 class="titulo5 mb-3">4.¿Las sesiones de tu clse se han impartido en los horarios oficiales y con la duración establecida?</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Unidad de Aprendizaje</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nivel de satisfacción</th>

                  </tr>
                </thead>
                <tbody>
                
                <?php 
            
            tabla($ID_USUARIO,$conexion,4);  
                ?>
               </tbody>
                </tbody>
              </table>
                </div>
            </div>
        </div>
        <div class="container rectangulo2 text-center px-lg-3 pt-lg-4 pb-lg-3 mb-4">
            <div class="row">
                <div class="col">
                    <h1 class="titulo5 mb-3">5.¿Cómo consideras que se ha atendido las distintas problemáticas relacionadas con tu clase?</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Unidad de Aprendizaje</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nivel de satisfacción</th>

                  </tr>
                </thead>
                <tbody>
                <?php 
               
               tabla($ID_USUARIO,$conexion,5);
                    
                 ?>
                </tbody>
                </tbody>
              </table>
                </div>
            </div>
        </div>
        <div class="container px-lg-3 pt-lg-4 pb-lg-3 mb-5">
            <div class="row">
                <div class="col">
                    <h1 class="comentario mb-3"> Agrega aquí un comentario, opinión o sugerencia sobre tus clases:</h1>
                    <div class="form-floating mb-3">
                        <textarea name="comentario" id="comentario" class=""  placeholder="  Comentario"  ></textarea>
                    </div>
                    <div class="d-grid justify-content-end">
                        <button type="button" class="btn btn-primary btn-lg mx-auto my-auto" onclick="myFunction()">Enviar Resultados</button>
                    </div>
                </div>
            </div>
        </div>
    </main>    
</section>
<section><!--Botón flotante-->
  <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
      <li class="mfb-component__wrap">
        <a href="#" class="mfb-component__button--main">
          <i class="mfb-component__main-icon--resting ion-plus-round"></i>
          <i class="mfb-component__main-icon--active ion-close-round"></i>
        </a>
        <ul class="mfb-component__list">
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

    <script>
function myFunction() {
    var radios = document.querySelectorAll('input[type="radio"]:checked');
    let valores = [];
    if (radios.length==document.getElementById("cantidades").value){
        $(':radio:checked').each(function(){
   valores.push($(this).val());
});
console.log(valores);
var comentario;
if (document.getElementById("comentario").value.length != 0){
   comentario=document.getElementById("comentario").value;


}
else  {

  comentario='1';

  } 

  $.ajax({
    type:"POST",
     url:"./php/Encuesta.php",
     data:{valores:valores, comentario:comentario},
     cache:false,
     success:(respAX) => {
      let AX = JSON.parse(respAX);
                        
        if(AX.cod == 1){
          Swal.fire({
                        title: 'Listo',
                        text: 'Tus datos han sido guardados correctamente',
                        icon: 'success',
                        confirmButtonText: 'Continuar',
                        timer:3000,
                        didDestroy:()=>{
                        window.location.href = "./DespedidaUsuario.html";
                      }
                      })


          }

          else{
          Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error, intente nuevamente',
                        icon: 'error',
                        confirmButtonText: 'Continuar',
                        timer:3000,
                        didDestroy:()=>{
                        window.location.href = "./Index.html";
                      }
                      })


          }




      }
    });

  }    

else 
Swal.fire(
  'Error',
  'Debes calificar todas las preguntas',
  'error'
)

}
</script>
  
</body>
</html>

<?php
}
else {
    header("location: ./Index.html");
}

?>