<?php

error_reporting(0);

$ust = '$_SESSION[\'youkai\']';

mkdir("../../pages/u/$youkai/");
mkdir("../../pages/u/$youkai/user-pictures");
mkdir("../../pages/u/$youkai/settings/");


$user_index = fopen("../../pages/u/$youkai/index.php", "w") or die("Dosya oluştuma başarısız.");
$user_page = fopen("../../pages/u/$youkai/user.php", "w") or die("Dosya oluştuma başarısız.");
$user_guest = fopen("../../pages/u/$youkai/guest.php", "w") or die("Dosya oluştuma başarısız.");


$user_setting_index = fopen("../../pages/u/$youkai/settings/index.php", "w") or die("Dosya oluştuma başarısız.");
$user_setting_p_r = fopen("../../pages/u/$youkai/settings/password-recovery-mail.php", "w") or die("Dosya oluştuma başarısız.");
$user_setting_page = fopen("../../pages/u/$youkai/settings/user.php", "w") or die("Dosya oluştuma başarısız.");


$dot = "'";
$sym = '$';
$about = 'about';
$discord = 'discord';
$link = 'link';
$social = 'social';
$youkai2 = "'$youkai'";

$index = 
'<?php
session_start();
error_reporting(0);

//çalıştırılan sorgunun veritabanında bir karşılığı olup olmadığı kontrol ediliyor
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    include("guest.php");
    include("http://localhost/assets/pages/footer.php");
    exit;
} else {    
    if($_SESSION["youkai"] != "'.$youkai.'") {
        include("guest.php");
    } else {
        include("user.php");
    }
    include("http://localhost/assets/pages/footer.php");
}

$db->close();
?>
';

$user =
'<?php
session_start();
error_reporting();

if($_SESSION["youkai"] != "'.$youkai.'" || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: http://localhost/pages/u/'.$youkai.'/");
}

?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>'.$youkai.' Kullanıcısı | Scarlet Devil Mansion</title>
        <meta name="description" content="'.$youkai.' kullanıcısının sayfası.">
        <meta name="keywords" content="Touhou, Touhou Project, Touhou Projesi">
        <meta name="author" content="Remilia Sc4rlet">
        <meta name="copyright" content="Copyright Scarlet Devil Mansion - 2022">
        <meta name="email" content="kyaleina@sdm-staff.org">
        <meta name="Charset" content="UTF-8">

        <link rel="icon" type="image/x-icon" href="http://localhost/assets/images/logo.ico">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" /> 
        <link rel="stylesheet" href="http://localhost/assets/css/users.css" />
        
        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <script src="http://localhost/assets/js/loading.js"></script>
    </head>
    <body>
    <?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
   include $_SERVER["DOCUMENT_ROOT"] . "/assets/pages/loggedoff.php";
}
else
{
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/pages/loggedin.php";}?>
        <center>
            <div class="section-top-bar">
                <img src="user-pictures/cover.png"> 
            </div>
        </center>
        <div class="nav-wrapper">
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Rozetler" class="cover-nav-link truncate-line" href="#">
                                Rozetler
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Yorumlar" class="cover-nav-link truncate-line" href="#">
                                Yorumlar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Takip ettiği konular" class="cover-nav-link truncate-line" href="#">
                                Takip ettiği konular
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Hakkında" class="cover-nav-link truncate-line" id="active">
                                Hakkında
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Ayarlar" class="cover-nav-link truncate-line" href="../'.$youkai.'/settings">
                                Ayarlar
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <center>
            <table>
                <tr>
                    <td class="profile-rg">
                        <div>
                            <img src="user-pictures/logo.png" style="max-width:80px;max-height:80px;min-width:80px;min-height:80px;object-fit:cover;" alt='.$youkai2.'>
                        </div>
                        <div class="profile-rg-pic">
                            <h4>'.$nameuser.' '.$surnameuser.'</h4>
                            <span>'.$youkai.'</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="cover-option-bar">
                            <div>
                                <h4>Hakkında</h3>
                                <a class="none-decoration">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["about"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Discord ya da başka bi\' şey</h3>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["discord"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Herhangi bir şey için link</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["link"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Sosyal Medya</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["social"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </center>';


$guest = 
'<?php
session_start();
error_reporting();

?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>'.$youkai.' Kullanıcısı | Scarlet Devil Mansion</title>
        <meta name="description" content="'.$youkai.' kullanıcısının sayfası.">
        <meta name="keywords" content="Touhou, Touhou Project, Touhou Projesi">
        <meta name="author" content="Remilia Sc4rlet">
        <meta name="copyright" content="Copyright Scarlet Devil Mansion - 2022">
        <meta name="email" content="kyaleina@sdm-staff.org">
        <meta name="Charset" content="UTF-8">

        <link rel="icon" type="image/x-icon" href="http://localhost/assets/images/logo.ico">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" /> 
        <link rel="stylesheet" href="http://localhost/assets/css/users.css" />
        
        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <script src="http://localhost/assets/js/loading.js"></script>
    </head>
    <body>
    <?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/pages/loggedoff.php";
}
else
{
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/pages/loggedin.php";}?>
        <center>
            <div class="section-top-bar">
                <img src="user-pictures/cover.png"> 
            </div>
        </center>
        <div class="nav-wrapper">
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Rozetler" class="cover-nav-link truncate-line" href="#">
                                Rozetler
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Yorumlar" class="cover-nav-link truncate-line" href="#">
                                Yorumlar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Takip ettiği konular" class="cover-nav-link truncate-line" href="#">
                                Takip ettiği konular
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Hakkında" class="cover-nav-link truncate-line" id="active">
                                Hakkında
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <center>
            <table>
                <tr>
                    <td class="profile-rg">
                        <div>
                            <img src="user-pictures/logo.png" style="max-width:80px;max-height:80px;min-width:80px;min-height:80px;object-fit:cover;" alt='.$youkai2.'>
                        </div>
                        <div class="profile-rg-pic">
                            <h4>'.$nameuser.' '.$surnameuser.'</h4>
                            <span>'.$youkai.'</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="cover-option-bar">
                            <div>
                                <h4>Hakkında</h3>
                                <a class="none-decoration">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["about"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Discord ya da başka bi\' şey</h3>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["discord"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Herhangi bir şey için link</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["link"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Sosyal Medya</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE youkai = '.$youkai2.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["social"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </center>';


//Kullanıcı ayar sayfası
$user_setting_page_f =
'<?php
session_start();
error_reporting(0);

if($_SESSION["youkai"] != "'.$youkai.'" || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: http://localhost/pages/u/'.$youkai.'/");
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/connections/connection.php";

$youkai = '.$youkai2.';

$about = $discord = $link = $social = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["about"]) && !empty($_POST["about"])) {
        $about = $_POST["about"];
    }
    if(isset($_POST["discord"]) && !empty($_POST["discord"])) {
        $discord = $_POST["discord"];
    }
    if(isset($_POST["link"]) && !empty($_POST["link"])) {
        $link = $_POST["link"];
    }
    if(isset($_POST["social"]) && !empty($_POST["social"])) {
        $social = $_POST["social"];
    }
    
    require_once $_SERVER["DOCUMENT_ROOT"] . "/connections/connection.php";

    if(isset($_POST["about"])) {
        $about = $_POST["about"];
        $sql = "UPDATE user_about SET about = \'$about\' WHERE youkai = \''.$youkai.'\'";
        mysqli_query($db, $sql);
    }
    if(isset($_POST["discord"])) {
        $discord = $_POST["discord"];
        $sql = "UPDATE user_about SET discord = \'$discord\' WHERE youkai = \''.$youkai.'\'";
        mysqli_query($db, $sql);
    }
    if(isset($_POST["link"])) {
        $link = $_POST["link"];
        $sql = "UPDATE user_about SET link = \'$link\' WHERE youkai = \''.$youkai.'\'";
        mysqli_query($db, $sql);
    }
    if(isset($_POST["social"])) {
        $social = $_POST["social"];
        $sql = "UPDATE user_about SET social = \'$social\' WHERE youkai = \''.$youkai.'\'";
        mysqli_query($db, $sql);
    }

    $_POST["about"] = $_POST["discord"] = $_POST["link"] = $_POST["social"] = "";
}
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
   
    // Check if file was uploaded without errors
   
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {

        $target_dir = "../user-pictures/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uOk = 1;

        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "file already exists.<br>";
            unlink("../user-pictures/logo.png");
        }
        
        // Check if $uOk is set to 0 
        if ($uOk == 0) {
            echo "Your file was not uploaded.<br>";
        } 
        
        // if uOk=1 then try to upload file
        else {
          
            // $_FILES["file"]["tmp_name"] implies storage path
            // in tmp directory which is moved to uploads
            // directory using move_uploaded_file() method
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {   
                $res  = $_FILES["photo"]["name"];
                $ad = explode(".", $res);
                /* echo $ad[0];
                print "<br>";
                echo $ad[1];
                print "<br>";
                echo $_FILES["photo"]["name"];
                print "<br>";
                echo $_FILES["photo"]["type"]; */
                $ad[0] = "logo";
                $ad[1] = "png";
                $_FILES["photo"]["name"] = $ad[0] . "." . $ad[1];
                
                // Moving file to New directory 
                if(!rename($target_file, "../user-pictures/". basename( $_FILES["photo"]["name"]))) {
                    echo "File moving operation failed..<br>";
                }
            }
            else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
}?><!doctype html>
<html lang="tr">
    <head>
        <meta name="robots" content="noindex">
        <meta charset="UTF-8">
        <title>Kullanıcı Ayarları | Scarlet Devil Mansion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="author" content="Remilia Sc4rlet">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/settings.css" />

        <!----=====  Font Awesome  =====---->
        <script src="https://kit.fontawesome.com/1493595c02.js" crossorigin="anonymous"></script>

        <!----=====  Google ADS  =====---->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="nav-wrapper">
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Geri Dön" class="cover-nav-link truncate-line" style="text-decoration: none; color: #fff;" href="http://localhost/pages/u/<?php echo $_SESSION["youkai"]?>">
                                ← Geri Dön
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Ayarlar" class="cover-nav-link truncate-line" style="text-decoration: none; color: #fff;" id="active">
                                Ayarlar
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="main">
            <div class="profile-picture">
            <span style="margin-left: 15px;">Resmin eşit boyutlara sahip olması, örneğin 128x128 piksel, tavsiye edilir.</span>
                <div class="profile-picture-content">
                    <img style="max-width:128px;max-height:128px;min-width:128px;min-height:128px;object-fit:cover;display:block;border-radius: 12px;" src="../user-pictures/logo.png">
                    <form class="pic-form" action="user.php" method="post" enctype="multipart/form-data">
                        <label class="label">
                            <input type="file" name="photo">
                            <span>Resim dosyası seçin.</span>
                        </label><br>
                        <input type="submit" value="Yolla" style="margin-left: 5px;">
                    </form>
                </div>
            </div>
        </div>
        <div class="main-2">
            <form class="form" action="user.php" method="post">
                <div>
                <label for="about">Hakkımda</label>
                <textarea class="textarea-control" id="about" name="about" rows="3" maxlength="200"><?php
                require "../../../../connections/connection.php";

                $result = $db->query("SELECT * FROM user_about WHERE youkai = \''.$youkai.'\'");

                while ($info = mysqli_fetch_array($result))
                {
                    echo $info["about"];
                }
                ?></textarea>
                <p><span id="count_message">200/</span><span id="message_counter">0</span></p>
                <p id="pt"></p>
                <script>
                    //about idsine sahip değeri al
                    var tex = document.getElementById("about");
                    //harflerine ayır
                    var ch = tex.value.split("");
                    //wordCount değerine mevcut karakter sayısını yaz 
                    var wordCount = document.getElementById("message_counter");
                    //message_counter içine değeri yaz
                    wordCount.innerText = ch.length;

                    //üsttekilerin aynısı gibi bir şey
                    var myText = document.getElementById("about");
                    var wordCount = document.getElementById("message_counter");

                    myText.addEventListener("keyup",function(){
                    var characters = myText.value.split("");
                    wordCount.innerText = characters.length;
                    });
                </script>
                </div>
                <div>
                <label for="discord">Discord</label>
                <span>Örneğin, romalı bıred phit#3131</span>
                <input type="text" name="discord" pattern=".+#\d{4}"
                value=
                "<?php $result = $db->query("SELECT * FROM user_about WHERE youkai = \''.$youkai.'\'");
                while ($info = mysqli_fetch_array($result))
                {
                    echo $info["discord"];
                }?>">
                </div>
                <div>
                <label for="link">Link</label><br>
                <span>Örneğin, https://(www.)scarletdevilmansion.org(com/net/tv...)</span>
                <input type="text" name="link" pattern="https?://.+"
                value=
                "<?php $result = $db->query("SELECT * FROM user_about WHERE youkai = \''.$youkai.'\'");
                while ($info = mysqli_fetch_array($result))
                {
                    echo $info["link"];
                }?>">
                </div>
                <div>
                <label for="social">Sosyal Medya</label><br>
                <span>Örneğin, https://(www.)instagram.com/sonelmabukucu/</span>
                <input type="text" name="social" pattern="https?://.+"
                value=
                "<?php $result = $db->query("SELECT * FROM user_about WHERE youkai = \''.$youkai.'\'");
                while ($info = mysqli_fetch_array($result))
                {
                    echo $info["social"];
                }?>">
                </div>
                <input type="submit" value="Kaydedelim mi?">
            </form>
        </div>
        <div class="main-3">
            <form class="form" action="recovery.php" method="post">
                <label for="password">Şifre Sıfırlama Talebi</label>
                <input type="password" name="password" id="password" placeholder="Şifre sıfırlamak için şifreni gir">
                <input type="password" name="confirm" id="confirm" placeholder="Şifre tekrarı">
                <input type="submit" value="Sıfırla?">
            </form>
        </div>
                
        <?php include("http://localhost/assets/pages/footer.php"); ?>

    </body>
</html>';


//Kullanıccı ayarlarına yönlendiren index.php dosyası
$user_setting_index_f =
'<?php
session_start();
error_reporting(0);

//çalıştırılan sorgunun veritabanında bir karşılığı olup olmadığı kontrol ediliyor
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../");
    exit;
} else {
    if($_SESSION["youkai"] != "'.$youkai.'") {
        header("Location: http://localhost/pages/u/'.$youkai.'/");
    } else {
        include("user.php");
    }
}

?>
';

fwrite($user_index, $index);
fwrite($user_page, $user);
fwrite($user_guest, $guest);
fwrite($user_setting_page, $user_setting_page_f);
fwrite($user_setting_index, $user_setting_index_f);

function custom_copy($src, $dst) { 
  
    // open the source directory
    $dir = opendir($src); 
  
    // Make the destination directory if not exist
    @mkdir($dst); 
  
    // Loop through the files in source directory
    while( $file = readdir($dir) ) { 
  
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) 
            { 
  
                // Recursively calling custom copy function
                // for sub directory 
                custom_copy($src . '/' . $file, $dst . '/' . $file); 
  
            }
            else { 
                copy($src . '/' . $file, $dst . '/' . $file); 
            } 
        } 
    } 
  
    closedir($dir);
} 
  
$src = "../../assets/images/user-pictures";
  
$dst = "../../pages/u/$youkai/user-pictures";

custom_copy($src, $dst);

fclose($user_page);

?>