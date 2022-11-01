<?php

require_once "../../connections/connection.php";

// Bağlantı kontrolü
if (mysqli_connect_errno())
    echo "Bağlantı kurulamadı: " . mysqli_connect_error();

$db->query("SET CHARACTER SET UTF8");

$username = $_GET['username'];
$uvid = $_GET['uvid'];

$verifier = "SELECT * FROM `user_verification` WHERE username = '$username' AND uvid = '$uvid'";
$verifiy_check = mysqli_query($db, $verifier);


if( mysqli_num_rows($verifiy_check) > 0 )
{
  if(mysqli_query($db, "UPDATE `user_verification` SET `uvid` = NULL WHERE username = '$username' AND uvid = '$uvid'"))
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