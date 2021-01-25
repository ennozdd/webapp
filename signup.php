<?php
include("templates/head.inc.php");
include("templates/topbar.inc.php");
include("templates/navbar-nav.inc.php");

function post_handle($username, $pass, $email){
    echo "Post request has been sent" . "<br>";
}

// if it's a post request, handle it
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    post_handle($username, $pass, $email);
    exit(0);
}

include("templates/signup.inc.php");

?>
