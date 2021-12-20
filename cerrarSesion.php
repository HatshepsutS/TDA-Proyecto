<?php
	session_start();
	$temp = $_REQUEST["ID_USUARIO"];
	
	unset($_SESSION[$temp]);
	
	header("location: ./Index.html");





?>