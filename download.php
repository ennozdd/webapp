<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php'); 
    die();
}

function send_file($filepath){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush();
    readfile($filepath);
    die();
}


$filepath = "/opt/openvpn/client/" . $_SESSION['username'] . ".ovpn";
if(file_exists($filepath)){
    send_file($filepath);
}else{
    exec("/opt/openvpn/wrapper " . $_SESSION['username']);
    send_file($filepath);
}


?>
