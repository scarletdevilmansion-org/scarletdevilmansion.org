<?php
session_start();
error_reporting();

require_once "connections/connection.php";


// Bağlantı kontrolü
if (mysqli_connect_errno()) {
  echo "Bağlantı kurulamadı: " . mysqli_connect_error();
}

$db->query("SET CHARACTER SET UTF8");

$tarih = date("Y"); 

$sql = "select * from users WHERE username = '$kullaniciadi' ";



$sonuc = mysqli_query($db, $sql );

//çalıştırılan sorgunun veritabanında bir karşılığı olup olmadığı kontrol ediliyor


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include('assets/logout-header.php');
    include('pages/logout-m-page.php');
    include('assets/footer.php');
    exit;
} else {
    include('assets/login-header.php');
    include('pages/login-m-page.php');
    include('assets/footer.php');
}


include('assets/footer.php');

mysqli_close($db);

?>