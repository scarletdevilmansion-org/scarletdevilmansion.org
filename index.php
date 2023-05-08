<?php
session_start();
error_reporting(E_ALL);

require_once $_SERVER["DOCUMENT_ROOT"] . "/functions/config.php";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include('assets/pages/logout-header.php');
    include('assets/pages/m-page.php');
    include('assets/pages/footer.php');
} else {
    include('assets/pages/login-header.php');
    include('assets/pages/m-page.php');
    include('assets/pages/footer.php');
}

$db = NULL;

?>