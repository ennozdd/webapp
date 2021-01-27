<?php
include_once("templates/head.inc.php");
include_once("templates/topbar.inc.php");
include_once("templates/navbar-nav.inc.php");
#include_once("templates/footer.inc.php");


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check_email(){
    $email = test_input($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailERR="Invalid email format";
        include("templates/signup.inc.php");
        echo $emailERR;
        exit(0);
    }

}

function check_arguments(){
    check_email();
    if( empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['email'])){
        include("templates/signup.inc.php");
        echo "<br>Username, password or email is missing<br>";
        exit(0);
    }
}

function post_handle($username, $pass, $email, $dbc){
    if(check_exist($username, $dbc)){
        include_once("templates/signup.inc.php");
        echo "<br> Username exists. <br>";
        return False;
    }
    $pass = password_hash($pass,  PASSWORD_DEFAULT);
    $query = "INSERT INTO user (username, password, email) VALUES(?, ?, ?)";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $pass, $email);
    mysqli_stmt_execute($stmt);
    echo "Post request has been sent" . "<br>";
}

function check_exist($username, $dbc){
    $query= "SELECT username FROM user WHERE username=?";

    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $result);
    mysqli_stmt_fetch($stmt);
    
    return $result ;
}

if (isset($_POST['submit'])){
    require_once('../mysql_connect.php');
    check_arguments();
    post_handle($_POST['username'], $_POST['pass'], $_POST['email'], $dbc);
    mysqli_close($dbc);

    exit(0);
}

include_once("templates/signup.inc.php");

?>
