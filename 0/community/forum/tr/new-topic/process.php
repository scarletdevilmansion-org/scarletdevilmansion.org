<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/connections/databaseconnect.php';

$topic_title = $topic_content = $topic_category = $topic_owner = $param_topic_owner = $param_topic_title = $param_topic_content = $param_topic_category = $param_topic_url = $sth = NULL;

/* if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: http://localhost/v2/login/");
    exit;
} */

if(isset($_POST["topic-title"]) && $_POST["topic-content"] && $_POST["topic-category"] && $_POST["topic-title"] != "" && $_POST["topic-title"] != " " && $_POST["topic-title"] != NULL)
{
    $topic_title = $_POST["topic-title"];
    $topic_content = $_POST["topic-content"];
    $topic_category = $_POST["topic-category"];
    $topic_owner = $_SESSION["youkai"];

    $param_topic_owner = $topic_owner;
    $param_topic_title = $topic_title;
    $param_topic_content = $topic_content;
    $param_topic_category = $topic_category;
    $param_topic_url = preg_replace('/\s+/', '-', $topic_title) . "-" . date("Hi");

    

    if($sth = $db->prepare("INSERT INTO topics (user_id, title, content, category, topic_url) VALUES (:user_id, :title, :content, :category, :topic_url)"))
    {
        //$db->bindParam($sql, "sssss", $param_topic_owner ,$param_topic_title, $param_topic_content, $param_topic_category, $param_topic_url);
        $sth->bindParam("user_id", $param_topic_owner, PDO::PARAM_STR);
        $sth->bindParam("title", $param_topic_title, PDO::PARAM_STR);
        $sth->bindParam("content", $param_topic_content, PDO::PARAM_STR);
        $sth->bindParam("category", $param_topic_category, PDO::PARAM_STR);
        $sth->bindParam("topic_url", $param_topic_url, PDO::PARAM_STR);
        $sth->execute();

        include "topic-create.php";        
    }
}

$db = NULL;
header("location: http://localhost/0/community/forum/tr/$param_topic_url/");
//header("location: " . $_SERVER['HTTP_REFERER']. "");

?>