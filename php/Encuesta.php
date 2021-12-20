
<?php
session_start();
$valores = $_POST['valores'];
$comentario = $_POST['comentario'];





$respAX["cod"] = 1; 

echo json_encode($respAX);


?>