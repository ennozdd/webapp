<?php
include("templates/head.inc.php");
include("templates/topbar.inc.php");
include("templates/navbar-nav.inc.php");

function post_handle($username, $pass){
    echo "Post request has been sent" . "<br>";
}

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = password_hash($_POST['pass'],  PASSWORD_DEFAULT); 


    post_handle($username, $pass);
    exit(0);
}

include("templates/login.inc.php");

?>
