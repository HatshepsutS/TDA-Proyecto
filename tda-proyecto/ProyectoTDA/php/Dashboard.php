<?php
$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
$pdo = new PDO('mysql:host=25.84.113.73; dbname=encuesta', $user, $pass);
$respAx = [];

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
    $porcentajeP1[$auxGlob] = round((($sumaP1) / 231)/5,2);
    }
?>