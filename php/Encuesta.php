
<?php

session_start();

include_once "./conexion.php";

$ID_USUARIO = $_SESSION['ID_USUARIO'];
if(isset($_SESSION['ID_USUARIO'])){
$valores = $_POST['valores'];
$comentario = $_POST['comentario'];

$cvalores = count($valores);
$numeroMat= $cvalores/5;


$i=0;
$idpregunta=1;

$i=registroResp($ID_USUARIO,$conexion,$valores,$i,$idpregunta);
$idpregunta=2;
$i=registroResp($ID_USUARIO,$conexion,$valores,$i,$idpregunta);
$idpregunta=3;
$i=registroResp($ID_USUARIO,$conexion,$valores,$i,$idpregunta);
$idpregunta=4;
$i=registroResp($ID_USUARIO,$conexion,$valores,$i,$idpregunta);
$idpregunta=5;
$i=registroResp($ID_USUARIO,$conexion,$valores,$i,$idpregunta);

PorcentajeSat($ID_USUARIO,$conexion,$valores);

insertarComentario($ID_USUARIO,$conexion,$comentario);

$respAX["cod"] = 1;
echo json_encode($respAX);

}
 

else {
    header("location: ./Index.html");
}







function registroResp($ID_USUARIO,$conexion,$valores,$i,$idpregunta)
{


  $queryMaterias = "select DISTINCT a.ID_MATERIA, b.grupo from materia_nomb a  inner join inscrito b on a.ID_Materia=b.ID_Materia where ID_usuario='$ID_USUARIO'"; 

  $check2 = mysqli_query($conexion, $queryMaterias); 
 
  $cvalores = count($valores);
  $numeroMat= $cvalores/5;


  if (mysqli_num_rows($check2) > 0) {
      // output data of each row
     
      while($row = mysqli_fetch_assoc($check2)) {
        $aux= conversorMS($valores[$i]);
        $IDMATERIA=$row["ID_MATERIA"];
        $grupo=$row["grupo"];
        $queryUpdate = "update encuesta set $aux=$aux+1 where ID_Materia='$IDMATERIA' and GRUPO='$grupo'and id_pregunta='$idpregunta'";
        $check3 = mysqli_query($conexion, $queryUpdate); 
        $i++;}
      }
     

    if(mysqli_affected_rows($conexion) > 0){
      
      }else{
        
    }  
  return $i;
  
  }





  function PorcentajeSat($ID_USUARIO,$conexion,$valores)
  {
  

$sql = 'select getIDForm2()' ;
$check1 = mysqli_query($conexion, $sql);
$IDFORMULARIO = mysqli_fetch_row($check1);


    $cvalores = count($valores);

    $numeroMat= $cvalores/5;

    $queryMat = "select ID_MATERIA from inscrito where ID_usuario='$ID_USUARIO'"; 
  
    $check = mysqli_query($conexion, $queryMat); 
   
    $cvalores = count($valores);
    $numeroMat= $cvalores/5;
  
    $satisfaccion=0; 
    $i=0; 
    $j=0;

    if (mysqli_num_rows($check) > 0) {
        
        while($row = mysqli_fetch_assoc($check)) {

          $IDMATERIA=$row["ID_MATERIA"];
          
          $satisfaccion=0;
          do {
            $satisfaccion=$valores[$i]+$satisfaccion; 
            $i=$i+$numeroMat; 
          } while ($i<$cvalores);
         
          $sat=$satisfaccion/5;
          $porcentaje= ($sat*100)/5; 
       
          $j++;
          $i= $j;

          $porcentaje2=floatval($porcentaje);
          $queryInsert = "INSERT INTO `encuesta`.`FORMULARIO` (`ID_FORMULARIO`, `ID_MATERIA`, `PORCENTAJE_SATISFACCION`) VALUES ('$IDFORMULARIO[0]', '$IDMATERIA', '$porcentaje2');";
          $A = mysqli_query($conexion, $queryInsert); 
          
          //$i++;
        }


        if(mysqli_affected_rows($conexion) > 0){
     
        }else{
    
            }

  
  
        }

       
        $queryUpdateUsser = "update usuario SET ID_FORMULARIO='$IDFORMULARIO[0]'  WHERE ID_USUARIO='$ID_USUARIO'";
        $B = mysqli_query($conexion, $queryUpdateUsser); 



        if(mysqli_affected_rows($conexion) > 0){
          
        }else{
         
            }



  
    
    
    }






    function insertarComentario($ID_USUARIO,$conexion,$comentario)
    {

      $queryUpdateUsser = "update usuario SET comentario='$comentario'  WHERE ID_USUARIO='$ID_USUARIO'";
      $B = mysqli_query($conexion, $queryUpdateUsser); 
      if(mysqli_affected_rows($conexion) > 0){
     
      }else{
     
          }



    }






function conversorMS($numero)
{

  if($numero==5)
   return 'MUY_SATISFECHO';
   else if ($numero==4)
   return 'SATISFECHO';
   else if ($numero==3)
   return 'NO_ME_QUEJO';
   else if ($numero==2)
   return 'POCO_SATISFECHO';
   else if ($numero==1)
   return 'NADA_SATIFECHO';
  else 
  return 'error';


}



?>