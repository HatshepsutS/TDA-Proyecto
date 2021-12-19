<?php

include_once "./conexion.php";



$queryMaterias = "select DISTINCT a.NOMBRE_MATERIA, b.grupo from materia_nomb a  inner join inscrito b on a.ID_Materia=b.ID_Materia where ID_usuario='2020000300'"; 

$check2 = mysqli_query($conexion, $queryMaterias); 

if (mysqli_num_rows($check2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($check2)) {
      echo "id: " . $row["NOMBRE_MATERIA"]. " - Name: " . $row["grupo"].   "<br>";
    }
  } else {
    echo "0 results";
  }
  
  
if (mysqli_num_rows($check2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($check2)) {
      echo "id: " . $row["NOMBRE_MATERIA"]. " - Name: " . $row["grupo"].   "<br>";
    }
  } else {
    echo "0 results";
  }
  
if (mysqli_num_rows($check2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($check2)) {
      echo "id: " . $row["NOMBRE_MATERIA"]. " - Name: " . $row["grupo"].   "<br>";
    }
  } else {
    echo "0 results";
  }
 

  $sql = "SELECT id_usuario, CONTRASEÑA FROM usuario  WHERE id_usuario ='2020000300' and id_formulario is null";
  $check = mysqli_query($conexion, $sql); 
  $registro = mysqli_fetch_row($check);
  echo $registro[1].   "<br>";
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
?>