<?php
include("templates/head.inc.php");
include("templates/topbar.inc.php");
include("templates/navbar-nav.inc.php");

function post_handle($username, $pass){
    echo "Post request has been sent" . "<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    post_handle($username, $pass);
    exit(0);
}

include("templates/login.inc.php");

?>
