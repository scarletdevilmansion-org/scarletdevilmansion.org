<?php
session_start();
error_reporting();

require "../../connections/connection.php";


// Bağlantı kontrolü
if (mysqli_connect_errno()) {
  echo "Bağlantı kurulamadı: " . mysqli_connect_error();
}

$db->query("SET CHARACTER SET UTF8");

$tarih = date("Y"); 

//Giriş yapılmış mı kontrol ediliyor
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include('login-off.php');
    exit;
} else {
    include('login-on.php');
}

include('../../assets/footer.php');

mysqli_close($db);
?>