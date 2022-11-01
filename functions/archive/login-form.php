<html>
        <head>
                <meta charset="utf-8">
                <link rel="stylesheet" href="https://localhost/assets/css/text-selection.css" />
        </head>
        <body>
 
<?php

include('../connections/connection.php');

        //giriş sayfasından veriler alınıp değişkenlere atanıyor
$username = mysqli_real_escape_string($db,$_POST['username']);
$password = mysqli_real_escape_string($db,$_POST['password']);

        //veritabanındaki verileri kontrol etmek için sql değişkenine sorgu atanıyor
$sql = "select * from users WHERE username = '$username' AND pword = '$password'";

//echo $sql;

        //sql değişkenine atanan sorgu sonuc değişkeni ile çalıştırılıyor
$sonuc= mysqli_query($db,$sql);

        //çalıştırılan sorgunun veritabanında bir karşılığı olup olmadığı kontrol ediliyor
if ( mysqli_num_rows( $sonuc ) > 0 )
{
        //sorgunun bir karşılığı var ise session değişkenlerine oturum verisi
        //aktarılıyor ve kullanıcı ana sayfaya yönlendiriliyor
        //ama önce session başlatılıyor
        //neden bilmem ama böyle yaptım oldu hehe.....
session_start();
        
        
$_SESSION['username'] = mysqli_real_escape_string($db,$_POST['username']);

if( !empty($_POST["remember"]) )
{
	setcookie ("username", $username, time()+ (10 * 365 * 24 * 60 * 60));  
	setcookie ("password",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
}
else
{
	echo '<script>alert("Çerezler ayarlandı.")</script>';
	setcookie ("username",""); 
	setcookie ("password","");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

}
else
{
        //sorgunun bir karşılığı yok ise ekrana çıktı veriliyor
echo "<center>Böyle bir kullanıcı bulunamadı.</center>";
    
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

mysqli_close($db);

?>
</body>
</html>