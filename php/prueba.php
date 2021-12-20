<?php

include_once "./conexion.php";


$valores=['1', '5', '3', '3', '5', '3', '5', '1', '5', '1', '5', '4', '5', '4', '3', '4', '4', '5', '4', '5', '1', '4', '5', '5', '4', '5', '1', '5', '4', '5', '4', '5', '3', '5', '4'];

$cvalores = count($valores);

$numeroMat= $cvalores/5;

echo $cvalores.   "<br>".   $numeroMat;


$satisfaccion=0; 



for ($i = 0 ; $i >= $cvalores; $i=$i+6) {
  $satisfaccion+=$valores[$i];
  
  
}

echo $satisfaccion. "   ---- ".$satisfaccion/5;





/*
echo conversorMS($valores[1]);
$ID_USUARIO='2020000300';

$i= registroResp($ID_USUARIO,$conexion,$valores,0,1);
echo "<br>".$i.   "<br>";

$i= registroResp($ID_USUARIO,$conexion,$valores,$i,2);

echo "<br>".$i.   "<br>";

$i= registroResp($ID_USUARIO,$conexion,$valores,$i,3);

echo "<br>".$i.   "<br>";

$i= registroResp($ID_USUARIO,$conexion,$valores,$i,4);

echo "<br>".$i.   "<br>";

$i= registroResp($ID_USUARIO,$conexion,$valores,$i,5);

echo "<br>".$i.   "<br>";*/


/*
$queryMaterias = "select * from encuesta where GRUPO='4CM1'" ; 

$check2 = mysqli_query($conexion, $queryMaterias); 
 
if (mysqli_num_rows($check2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($check2)) {
      echo "ID_MATERIA: " . $row["ID_MATERIA"]. " - PREGUNTA : " . $row["ID_PREGUNTA"]. " - GRUPO : " . $row["GRUPO"]. " - MUY_SATISFECHO : " . $row["MUY_SATISFECHO"]. " - SATISFECHO : " . $row["SATISFECHO"] . " - NO_ME_QUEJO : " . $row["NO_ME_QUEJO"]. " - POCO_SATISFECHO : " . $row["POCO_SATISFECHO"] . " - NADA_SATISFECHO : " . $row["NADA_SATISFECHO"]  ."<br>";
    }

  }
  else {
    echo "results 0 ";

  }

*/

/*
  if (mysqli_num_rows($check) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($check)) {
      echo "id: " . $row["id_usuario"].  " - Name: " . $row["CONTRASEÑA"].   "<br>";
    }
  } else {
    echo "0 results";
  }

*/




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
        $queryUpdate = "update encuesta_ set $aux=$aux+1 where ID_Materia='$IDMATERIA' and GRUPO='$grupo'and id_pregunta='$idpregunta'";



        echo "id: " . $row["ID_MATERIA"]. " - Name: " . $row["grupo"]. " -  ".$valores[$i]  ."<br>";
     
     
        $i++;
      }



    } else {
      echo "0 results";
    } 
  
  return $i;
  
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