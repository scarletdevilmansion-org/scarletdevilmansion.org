<?php

require_once "../../connections/connection.php";


$db->query("SET CHARACTER SET UTF8");

$youkai = $_GET['youkai'];
$uvid = $_GET['uvid'];

$verifier = "SELECT * FROM `user_verification` WHERE youkai = '$youkai' AND uvid = '$uvid'";
$verify_check = mysqli_query($db, $verifier);


if( mysqli_num_rows($verify_check) > 0 )
{
  if(mysqli_query($db, "UPDATE `user_verification` SET `uvid` = NULL WHERE youkai = '$youkai' AND uvid = '$uvid'"))
  {
    include("dogrulama-basarili.html");
  }
  else
  {
    include("dogrulama-hatali.html");
  }
}
else
{
  include("dogrulama-basarisiz.html");
}

mysqli_close($db);
?>