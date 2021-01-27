<?php
session_start();
function include_index(){
    include("templates/head.inc.php");
    include("templates/topbar.inc.php");
    include("templates/navbar-nav.inc.php");
    include("templates/homepage-content-Carousel.inc.php");
    include("templates/3image-text-homapage.inc.php");
    include("templates/bg-image-text.inc.php");
    include("templates/footer.inc.php");
}

if(isset($_SESSION['username'])){
    include("templates/head.inc.php");
    include("templates/topbar.inc.php");
    include("templates/navbar-nav.inc.php");
}else{
include_index();
}


if(isset($_SESSION['username'])){
    echo "<br><a>Hey " . $_SESSION['username'] . '!</a><br>';
    echo "<br><a> This is clearly not the most intuitive interface but it should do the trick!</a><br>";
    echo "<br> <a href='/logout.php' style='text-align:center'>Log out</a> <a>OR</a> <a href=/download.php>download</a> the vpn client <br>";
}else{
    exit(0);
}


?>
