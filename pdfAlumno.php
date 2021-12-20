<?php
include_once "./php/conexion.php";
session_start();
$ID_USUARIO = $_SESSION['ID_USUARIO'];
if(isset($_SESSION["ID_USUARIO"])){

 
require("./mpdf/vendor/autoload.php");


$sqlR = "SELECT NOMBRE, ID_Formulario FROM usuario where ID_USUARIO = '$ID_USUARIO'";
$check = mysqli_query($conexion, $sqlR);
$registro = mysqli_fetch_row($check);



$queryMaterias = "Select  a.NOMBRE_MATERIA, b.PORCENTAJE_SATISFACCION from  materia_nomb a inner join formulario b  on a.ID_MATERIA=b.ID_MATERIA where b.id_formulario='$registro[1]';" ; 
$check2 = mysqli_query($conexion, $queryMaterias); 




  $html = "
  <style>
    body{text-align='center';}
  </style>
  <body>
    <center><h1>Gracias por responder la encuesta de satisfacción ESCOM 2020 </h1><h2> Numero de boleta ".$ID_USUARIO."</h2></center>
    <h2>Nombre: ".$registro[0]."</h2>
    <h2>Clave de formulario: ".$registro[1]."</h2>";

     
        while ($fila = mysqli_fetch_array($check2, MYSQLI_ASSOC)) {
            $html .= 
            "<br>".
           
            "<table style='text-align: center; width:100%;'>"
            ."<tr>"
            ."<td>"."Nombre de la materia "."</td>"
            ."<td>"."Porcentaje de satisfacción"."</td>"
            ."</tr>"
            
            ."<tr>"
            ."<td>".$fila['NOMBRE_MATERIA']."</td>"
            ."<td>".$fila['PORCENTAJE_SATISFACCION']."</td>"
            
            ."</tr>"
            ."</table>"
            ;
          }
  
  

$footer = "
<table width='100%'>
  <tr style='background-color: #474A57;'>
    <td width='33%' style='text-align: center; color: #ffffff'>{DATE j-m-Y}</td>
    <td width='33%' style='text-align: center; color: #ffffff'>{PAGENO}/{nbpg}</td>
    <td width='33%' style='text-align: center; color: #ffffff;'>PDF Alumno</td>
  </tr>
</table>
";

$mpdf = new \Mpdf\Mpdf([
"orientation"=>"L",
"format"=>"Letter",
"margin_top"=>35
]);


$mpdf->setHTMLHeader($header);
$mpdf->setHTMLFooter($footer);
$mpdf->writeHTML($html);
$mpdf->setWatermarkText("ESCOM",0.1);
$mpdf->showWatermarkText = true;
$mpdf->output();

}
else {
    header("location: ./Index.html");
}


?>