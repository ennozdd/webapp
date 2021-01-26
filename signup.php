<?php
include("templates/head.inc.php");
include("templates/topbar.inc.php");
include("templates/navbar-nav.inc.php");
include("templates/footer.inc.php");

function post_handle($username, $pass, $email){
    echo "Post request has been sent" . "<br>";
    #$query = "INSERT VALUES($username, $pass, $email) INTO vpn";
    #@mysql_query($dbc, $query);
}

function check_arguments(){
    if( empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['email'])){
        include("templates/signup.inc.php");
        // enable "submit" only when all fields are filled 
        echo "<br>Username, password or email is missing<br>";
        exit(0);
    }
}

if (isset($_POST['submit'])){
    check_arguments();


    require_once('../mysql_connect.php');
    post_handle($_POST['username'], $_POST['pass'], $_POST['email']);
    mysqli_close($dbc);

    exit(0);
}

include_once("templates/signup.inc.php");

?>
