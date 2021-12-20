<?php
include_once "./conexion.php";

/*
if(isset($_SESSION["IDUSUARIO"])){
}*/

require("./mpdf/vendor/autoload.php");

$ID_USUARIO='2020000300';


$sqlR = "SELECT NOMBRE, ID_Formulario FROM usuario where ID_USUARIO = '$ID_USUARIO'";
$check = mysqli_query($conexion, $sqlR);
$registro = mysqli_fetch_row($check);



$queryMaterias = "Select  a.NOMBRE_MATERIA, b.PORCENTAJE_SATISFACCION from  materia_nomb a inner join formulario b  on a.ID_MATERIA=b.ID_MATERIA where b.id_formulario='$registro[1]';" ; 
$check2 = mysqli_query($conexion, $queryMaterias); 




if (mysqli_num_rows($check2) > 0) {
  
    while($row = mysqli_fetch_assoc($check2)) {
      echo "Nombre de la materia : " . $row["NOMBRE_MATERIA"]. " - Satisfaccion : " . $row["PORCENTAJE_SATISFACCION"]."<br>";
    }

  }
  else {
    echo "results 0 ";

  }


/*
  $html = "
  <style>
    body{text-align='center';}
  </style>
  <body>
    <center><h1>".$ID_USUARIO."</h1></center>
    <h2>".$registro[0]."</h2>
    <h2>".$registro[1]."</h2>";
    
while ($fila = mysqli_fetch_array($resRespuestas, MYSQLI_ASSOC)) {
  $html .= 
  "<br>".
  "<br>".
  "<table style='text-align: center; width: 100%;'>"
  ."<tr>"
  
  ."<td>"."MATERIA"."</td>"
  ."<td>"."GRUPO"."</td>"
  ."<td>"."RESPUESTA 1"."</td>"
  ."<td>"."RESPUESTA 2"."</td>"
  ."<td>"."RESPUESTA 3"."</td>"
  ."<td>"."RESPUESTA 4"."</td>"
  ."<td>"."RESPUESTA 5"."</td>"
  ."<td>"."FECHA"."</td>"
  ."</tr>"
  
  ."<tr>"
  ."<td>".$fila['nomMateria']."</td>"
  ."<td>".$fila['grupo']."</td>"
  ."<td>".$fila['q1']."</td>"
  ."<td>".$fila['q2']."</td>"
  ."<td>".$fila['q3']."</td>"
  ."<td>".$fila['q4']."</td>"
  ."<td>".$fila['q5']."</td>"
  ."<td>".$fila['fechaRealizacion']."</td>"
  ."</tr>"
  ."</table>"
  ;
}



*/









?>