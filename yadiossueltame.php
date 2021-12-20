<?php
    if(isset($_POST['submit'])){
        $secret = "6Ld71bYdAAAAAHE_KZMk70fG7P3m10GXjrWg7aFd";
        $response = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=&remoteip=$remoteip";
        $data = file_get_contents($url);
        $row = json_decode($data,true);
    }







    
?>