<?php

$ID_USUARIO = $_POST['ID_USUARIO'];
$Contrasena = $_POST['Contrasena'];
$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
mysqli_set_charset($conexion, "utf8");

$respAX = [];
$sql = "SELECT * FROM usuario where ID_USUARIO = '$ID_USUARIO' and CONTRASEÑA = '$Contrasena'";
$check = mysqli_query($conexion, $sql);
$registro = mysqli_fetch_row($check);


// cod 1: alumno cod2: administrador cod0: error
if(mysqli_num_rows($check) == 1){
    $respAX["cod"] = 1;
    
    if (!ctype_digit($ID_USUARIO)) {
        $respAX["cod"] = 2 ;
        $respAX["msj"] = "Bienvenido $registro[3] eres administrador";
    }
    $respAX["msj"] = "Bienvenido alumno $registro[3]";
}
else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error. Favor de intentarlo nuevamente.";
}


echo json_encode($respAX);


?>