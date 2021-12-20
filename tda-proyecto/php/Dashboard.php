<?php
$ID_USUARIO = $_SESSION['ID_USUARIO'];
$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
$pdo = new PDO('mysql:host=25.84.113.73; dbname=encuesta', $user, $pass);
$respAx = [];
$sqlNombre = "SELECT NOMBRE FROM usuario where ID_USUARIO = '$ID_USUARIO'";
$checkNombre = mysqli_query($conexion, $sqlNombre);
$registroNombre = mysqli_fetch_row($checkNombre);
$nombreAdmin = $registroNombre[0];

mysqli_set_charset($conexion, "utf8");
$sql = "SELECT * FROM usuario";
$check = mysqli_query($conexion, $sql);
$comentarios = mysqli_fetch_all($check);
$numDatos = count($comentarios);
$tu = 0;
for($auxGlob = 1; $auxGlob<=5; $auxGlob++){
    $sqlPreguntas = "SELECT ID_MATERIA, ID_PREGUNTA, MUY_SATISFECHO, SATISFECHO, NO_ME_QUEJO, POCO_SATISFECHO, NADA_SATISFECHO FROM encuesta WHERE ID_PREGUNTA = $auxGlob"; //Poner parámetro de por materia
    $checkPreguntas = mysqli_query($conexion, $sqlPreguntas);
    $preguntas = mysqli_fetch_all($checkPreguntas);
    
    $digito = 5;
    $sumaP1 = 0;
    for($i=2;$i<=6;$i++){
        $auxiliarPregunta = 0;
        foreach($preguntas as $pregunta){
            $auxiliarPregunta += $pregunta[$i]*$digito;
            $tu++;
        }
        $sumaP1 += $auxiliarPregunta;
        $digito--;
    }
    $porcentajeP1[$auxGlob] = round((($sumaP1) / $numDatos)/5,2);
    }
?>