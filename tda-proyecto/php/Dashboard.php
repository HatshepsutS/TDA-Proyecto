<?php

$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
$pdo = new PDO('mysql:host=25.84.113.73; dbname=encuesta', $user, $pass);

/*
$conexion=new mysqli('localhost','root','2.71828','encuesta');
$pdo = new PDO('mysql:host=localhost; dbname=encuesta', 'root', '2.71828');
*/
mysqli_set_charset($conexion, "utf8");

for($auxGlob = 1; $auxGlob<=5; $auxGlob++){
    $sqlPreguntas = "SELECT * FROM encuesta WHERE ID_PREGUNTA = $auxGlob"; //Poner parámetro de por materia
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
    $porcentajeP1[$auxGlob] = (($sumaP1) / 231)/5;
    $porcentajeP1[$auxGlob] = round($porcentajeP1[$auxGlob],2);
    //echo $porcentajeP1[$auxGlob]."<br/>";
    }

?>