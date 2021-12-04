<?php
//Variables

$ID_USUARIO = $_REQUEST['ID_USUARIO'];
$Contrasena = $_REQUEST['Contrasena'];


$server='25.84.113.73';
$user='root';
$pass='=pEkL8AjixedeYAw6JA@';
$db='encuesta';
$conexion=new mysqli($server,$user,$pass,$db);
mysqli_set_charset($conexion, "utf8");

$sql = "SELECT * FROM usuario where ID_USUARIO = '$ID_USUARIO' and CONTRASEÑA = '$Contrasena'";
$check = mysqli_query($conexion, $sql);
$registro = mysqli_fetch_row($check);

if(mysqli_num_rows($check) == 1){
    if (!ctype_digit($ID_USUARIO)) {
        echo "Eres admin.<br/>";
    }
    echo "Bienvenido $registro[3]";
}
else{
    echo "No coinciden datos <a href='./Prueba.html'>Regresar</a>";
}



/*
$sql = "INSERT INTO inscrito VALUES ('2020320219', '4SCM2', 'TDA')";
$resInsAlumno = mysqli_query($conexion, $sql);
if(mysqli_affected_rows($conexion) == 1){
    echo "Gracias. Tu registro se realizó correctamente. ";
}else{
    echo "Error. No se pudo guardar tu información. Favor de intentarlo nuevamente. ";
  }
*/
?>
