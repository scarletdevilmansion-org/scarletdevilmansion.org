<?php
session_start();
error_reporting(1);

require_once "connections/connection.php";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include('assets/pages/logout-header.php');
    include('assets/pages/m-page.php');
    include('assets/footer.php');
} else {
    include('assets/pages/login-header.php');
    include('assets/pages/m-page.php');
    include('assets/footer.php');
}

mysqli_close($db);

?>