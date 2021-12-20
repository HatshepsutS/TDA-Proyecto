<?php
$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
$pdo = new PDO('mysql:host=25.84.113.73; dbname=encuesta', $user, $pass);
$respAx = [];
mysqli_set_charset($conexion, "utf8");
//echo "Este es $busqAux";
$sqlGrupo = "SELECT GRUPO FROM materia WHERE ID_MATERIA = '$busqAux'"; //Poner parámetro de por materia
$checkGrupo = mysqli_query($conexion, $sqlGrupo);
$GrupoAux = mysqli_fetch_all($checkGrupo);
foreach($GrupoAux as $GrupoA){
    foreach($GrupoA as $Grupo){
        echo "<br/>". $Grupo;
for($auxGlob = 1; $auxGlob<=5; $auxGlob++){
    $sqlGrupo = "WITH SQLUNION AS (select * from encuesta UNION select * from materia) select * from SQLUION where ID_PREGUNTA = $auxGlob AND ID_MATERIA = '$busqAux' AND GRUPO = '$Grupo'";
    //$sqlPreguntas = "SELECT * FROM encuesta WHERE ID_PREGUNTA = $auxGlob AND ID_MATERIA = '$busqAux' AND GRUPO = '$Grupo'"; //Poner parámetro de por materia
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
    echo " ".round((($sumaP1) / 10)/5,2);
    }
}
}
?>