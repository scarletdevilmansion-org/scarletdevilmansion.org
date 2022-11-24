<?php
session_start();
error_reporting();

require_once "connections/connection.php";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include('assets/logout-header.php');
    include('assets/m-page.php');
    include('assets/footer.php');
    exit;
} else {
    include('assets/login-header.php');
    include('assets/m-page.php');
    include('assets/footer.php');
}

mysqli_close($db);

?>