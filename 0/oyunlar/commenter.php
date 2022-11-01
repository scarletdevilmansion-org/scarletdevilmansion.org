<?php
session_start();
include('../../connections/databaseconnect.php');


if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    $url = "https://";
} else {
    $url = "http://";
}

$url1 = $_SERVER['HTTP_HOST'];

$url2 = $_SERVER['REQUEST_URI'];

$pageurl = $url . $url1 . $url2;

$username = $_SESSION['username'];

$comment = $_POST['comment'];

$date = date('Y-m-d H:i:s');

$commentquery = "INSERT INTO `user_comment` (siteuser_id, commented_topic_id, comment) VALUES ('$username', '$pageurl', '$comment')";

$my_Insert_Statement = $db->query($commentquery);

header('Location: ' . $_SERVER['HTTP_REFERER']);


?>