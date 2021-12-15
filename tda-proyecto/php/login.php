<?php
echo('Hola');

/*
$ID_USUARIO = $_POST['ID_USUARIO'];
$Contrasena = $_POST['Contrasena'];
$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
mysqli_set_charset($conexion, "utf8");

$respAX = [];
$sql = "SELECT * FROM usuario where ID_USUARIO = '$ID_USUARIO' and CONTRASEÑA = '$ID_USUARIO'";
$check = mysqli_query($conexion, $sql);
$registro = mysqli_fetch_row($check);


// cod 1: alumno cod2: administrador cod0: error
if(mysqli_num_rows($check) == 1){
    $respAX["cod"] = 1;
    
    if (!ctype_digit($ID_USUARIO)) {
        $respAX["cod"] = 2 ;
        $respAX["msj"] = "<h5>Bienvenido $registro[3] eres administrador </h5>";
    }
    $respAX["msj"] = "<h5>Bienvenido alumno $registro[3] </h5>";
}
else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "<h5>Error. Favor de intentarlo nuevamente.</h5>";
}


echo json_encode($respAX);

*/

?>