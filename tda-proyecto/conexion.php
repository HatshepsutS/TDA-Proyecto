<?php

$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
if($conexion->connect_errno){
die("La conexion ha fallado ".$conexion->connect_errno);
}
else {
    echo "Hola mundo"; 
}

?>
