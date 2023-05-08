<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/functions/config.php";

//global olarak durum değişkeni tanımlanıyor
$_SESSION['status'] = $_POST['status'];
$status = $_POST['status'];

// users_status tablosuna veri yazma
$stmt = $db->prepare("UPDATE user_status SET status = :status WHERE youkai = :youkai");
$stmt->bindParam(':youkai', $_SESSION['youkai']);
$stmt->bindParam(':status', $status);
$stmt->execute();

