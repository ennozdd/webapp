<?php
session_start();
function post_handle($username, $pass, $dbc){
    $query = "SELECT password FROM user WHERE  username=?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hash);
    mysqli_stmt_fetch($stmt);

    return password_verify($pass, $hash);
}


function start_includes(){
        include_once("templates/head.inc.php");
        include_once("templates/topbar.inc.php");
        include_once("templates/navbar-nav.inc.php");
        include_once("templates/login.inc.php");
        echo "<br> New to " . $_SERVER['SERVER_NAME'] . "? <a href='/signup.php'>SIGN UP</a>";
}


if (isset($_POST['submit'])){
    require_once('../mysql_connect.php');
    if(post_handle($_POST['username'], $_POST['pass'], $dbc)){
        $_SESSION['username'] = $_POST['username'];
        header('location: index.php');
    } else{
        start_includes();
        echo "<br>The username and password that you've entered doesn't match any account. <a href='/signup.php'> Sign up for an account.</a><br>";
    }
    exit(0);
}


start_includes();


?>
