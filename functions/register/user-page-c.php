<?php

$ust = '.$_SESSION["username"].';

mkdir("../../pages/u/$username/");
mkdir("../../pages/u/$username/user-pictures");
mkdir("../../pages/u/$username/settings/");


$user_index = fopen("../../pages/u/".$username."/index.php", "w") or die("Dosya oluştuma başarısız.");
$user_page = fopen("../../pages/u/".$username."/user.php", "w") or die("Dosya oluştuma başarısız.");
$user_guest = fopen("../../pages/u/".$username."/guest.php", "w") or die("Dosya oluştuma başarısız.");


$user_setting_index = fopen("../../pages/u/".$username."/settings/index.php", "w") or die("Dosya oluştuma başarısız.");
$user_setting_p_r = fopen("../../pages/u/".$username."/settings/password-recovery-mail.php", "w") or die("Dosya oluştuma başarısız.");
$user_setting_page = fopen("../../pages/u/".$username."/settings/user.php", "w") or die("Dosya oluştuma başarısız.");


$dot = "'";
$sym = '$';
$about = 'about';
$discord = 'discord';
$link = 'link';
$social = 'social';
$username2 = "'.$username.'";

$index = "
<?php
session_start();
error_reporting(0);

//çalıştırılan sorgunun veritabanında bir karşılığı olup olmadığı kontrol ediliyor
if(!isset(" . $sym . "_SESSION['loggedin']) || " . $sym . "_SESSION['loggedin'] !== true)
{
    include('guest.php');
    include('http://localhost/assets/pages/footer.php');
    exit;
} else {    
    if(" . $sym . "_SESSION['username'] != '".$username."') {
        include('guest.php');
    } else {
        include('user.php');
    }
    include('http://localhost/assets/pages/footer.php');
}

" . $sym . "db->close();
?>
";

$user = '
<?php
session_start();
error_reporting();

?>
<!DOCTYPE html>
<html lang=tr>
    <head>
        <title> Kullanıcısı | Scarlet Devil Mansion</title>
        <meta name="description" content="'.$username.' kullanıcısının sayfası.">
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
   echo '.$dot.'<center>
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="http://localhost/">
                                Ana Sayfa
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Oyunlar" class="cover-nav-link truncate-line" href="#">
                                Oyunlar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Videolar" class="cover-nav-link truncate-line" href="#">
                                Videolar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Müzikler" class="cover-nav-link truncate-line" href="#">
                                Müzikler
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Mangalar" class="cover-nav-link truncate-line" href="#">
                                Mangalar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Giriş Yap" class="cover-nav-link truncate-line" href="http://localhost/functions/login/">
                                Giriş Yap
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <form action="http://localhost/search/" method="GET">
                                <input type="text" placeholder="Ara Beni Bul Beni" name="q">
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </center>'.$dot.';
}
else
{
  echo '.$dot.'<center>
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="#">
                                Ana Sayfa
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Oyunlar" class="cover-nav-link truncate-line" href="#">
                                Oyunlar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Videolar" class="cover-nav-link truncate-line" href="#">
                                Videolar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Müzikler" class="cover-nav-link truncate-line" href="#">
                                Müzikler
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Mangalar" class="cover-nav-link truncate-line" href="#">
                                Mangalar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Profil" class="cover-nav-link truncate-line" href="http://localhost/pages/u/'.$ust.'">
                                Profil
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Çıkış Yap" class="cover-nav-link truncate-line" href="http://localhost/functions/logout/">
                                Çıkış Yap
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <form action="http://localhost/search/" method="GET">
                                <input type="text" placeholder="Ara Beni Bul Beni" name="q">
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </center>'.$dot.';}?>
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
                            <a title="Ayarlar" class="cover-nav-link truncate-line" href="../'.$username.'/settings">
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
                            <img src="user-pictures/logo.png" alt='.$dot.''.$username.''.$dot.'>
                        </div>
                        <div class="profile-rg-pic">
                            <h4>'.$nameuser.' '.$surnameuser.'</h4>
                            <span>'.$username.'</span>
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
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$about.'"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Discord ya da başka bi'.$dot.' şey</h3>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$discord.'"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Herhangi bir şey için link</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$link.'"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Sosyal Medya</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$social.'"];
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



        

$guest = '
<?php
session_start();
error_reporting();

?>
<!DOCTYPE html>
<html lang=tr>
    <head>
        <title>'.$username.' Kullanıcısı | Scarlet Devil Mansion</title>
        <meta name="description" content="'.$username.' kullanıcısının sayfası.">
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
    echo '.$dot.'<center>
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="#">
                                Ana Sayfa
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Oyunlar" class="cover-nav-link truncate-line" href="#">
                                Oyunlar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Videolar" class="cover-nav-link truncate-line" href="#">
                                Videolar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Müzikler" class="cover-nav-link truncate-line" href="#">
                                Müzikler
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Mangalar" class="cover-nav-link truncate-line" href="#">
                                Mangalar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Giriş Yap" class="cover-nav-link truncate-line" href="http://localhost/functions/login/">
                                Giriş Yap
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <form action="http://localhost/search/" method="GET">
                                <input type="text" placeholder="Ara Beni Bul Beni" name="q">
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </center>'.$dot.';
}
else
{
    echo '.$dot.'<center>
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="#">
                                Ana Sayfa
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Oyunlar" class="cover-nav-link truncate-line" href="#">
                                Oyunlar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Videolar" class="cover-nav-link truncate-line" href="#">
                                Videolar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Müzikler" class="cover-nav-link truncate-line" href="#">
                                Müzikler
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Mangalar" class="cover-nav-link truncate-line" href="#">
                                Mangalar
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Profil" class="cover-nav-link truncate-line" href="http://localhost/pages/u/'.$ust.'">
                                Profil
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Çıkış Yap" class="cover-nav-link truncate-line" href="http://localhost/functions/logout/">
                                Çıkış Yap
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <form action="http://localhost/search/" method="GET">
                                <input type="text" placeholder="Ara Beni Bul Beni" name="q">
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </center>'.$dot.';}?>
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
                            <img src="user-pictures/logo.png" alt='.$dot.''.$username.''.$dot.'>
                        </div>
                        <div class="profile-rg-pic">
                            <h4>'.$nameuser.' '.$surnameuser.'</h4>
                            <span>'.$username.'</span>
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
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$about.'"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Discord ya da başka bi'.$dot.' şey</h3>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$discord.'"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Herhangi bir şey için link</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$link.'"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                                <br>
                                <h4>Sosyal Medya</h4>
                                <a class="none-decoration" href="#">
                                    <?php
                                    include("../../../connections/connection.php");
                                    $result = $db->query("SELECT * FROM user_about WHERE user_id = '.$dot.''.$username.''.$dot.'");

                                    while ($info = mysqli_fetch_array($result))
                                    {
                                        echo $info["'.$social.'"];
                                    }
                                    $db->close();
                                    ?>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </center>
        ';

$user_setting_page_f = "
<?php

require_once '../../../../connections/connection.php';


// Bağlantı kontrolü
if (mysqli_connect_errno())
  echo 'Bağlantı kurulamadı: ' . mysqli_connect_error();

".$sym."db->query('SET CHARACTER SET UTF8');
".$sym."username = ".$sym."_SESSION['username'];

/** if(!empty(".$sym."_POST['hakkimda']))
 * 
 * {
 *     ".$sym."param_about = ".$sym."_POST['hakkimda'];
 *     ".$sym."about_sql = 'UPDATE `user_about` SET `about` = `".$sym."param_about`, WHERE `user_id` = `".$sym."username`';
 *     ".$sym."db->prepare(".$sym."about_sql);
 * }
 *
 */

if(!empty(".$sym."_POST['password']))
{
    ".$sym."password = ".$sym."_POST['password'];
    
    ".$sym."result = mysqli_query(".$sym."db,'SELECT password FROM users WHERE username = `".$sym."username`');

    while (".$sym."info = mysqli_fetch_array(".$sym."result,MYSQLI_ASSOC))
    {
        ".$sym."hashed_password = ".$sym."info['password'];
    }

    if(password_verify(".$sym."password, ".$sym."hashed_password)){
        include 'password-recovery-mail.php';
    }
}

".$sym."_POST['hakkimda'] = ".$sym."_POST['baglanti'] = ".$sym."_POST['discord'] = ".$sym."_POST['sosyal-medya'] = ".$sym."_POST['password'] = '';

?>

<!doctype html>
<html>
    <head>
        <meta name='robots' content='noindex'>
        <meta charset='UTF-8'>
        <title>Kullanıcı Ayarları | Scarlet Devil Mansion</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta property='og:image' content='http://localhost/assets/images/open-graph/cover.png'>
        <meta name='twitter:card' content='summary_large_image' />
        <meta property='og:url' content='https://scarletdevilmansion.org'>
        <meta property='og:title' content='Kullanıcı Ayarları'>
        <meta property='og:type' content='website'>
        <meta property='og:locale' content='TR'>
        <meta name='description' content='Touhou ile ilgili türkçe içerikleri bulabileceğiniz bir, diyar? Alem? internet sitesi?...'>
        <meta name='keywords' content=''>
        <link rel='canonical' href='https://scarletdevilmansion.org' />

        <meta name='author' content='Hakurei Remilia'>
        <link rel='stylesheet' href='http://localhost/assets/css/menu.css' />
        <link rel='stylesheet' href='http://localhost/assets/css/users.css' />
        <link rel='stylesheet' href='http://localhost/assets/css/settings.css' />
        <!----===== Bootstrap CSS =====---->
        <link rel='stylesheet' href='http://localhost/assets/css/bootstrap/css/bootstrap.css' />

        <link rel='alternate' type='application/rss+xml' title='Latest File' href='https://scarletdevilmansion.org/rss/#' />
        <link rel='alternate' type='application/rss+xml' title='Latest Videos' href='https://scarletdevilmansion.org/rss/#' />
        <link rel='alternate' type='application/rss+xml' title='Recent Topic' href='https://scarletdevilmansion.org/rss/#' />
        <link rel='alternate' type='application/rss+xml' title='Latest Image' href='https://scarletdevilmansion.org/rss/#' />

        <link rel='manifest' href='http://localhost/assets/manifest.webmanifest/'>
        <meta name='msapplication-config' content='http://localhost/assets/browserconfig.xml/'>
        <meta name='msapplication-starturl' content='/'>
        <meta name='application-name' content='Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..'>
        <meta name='apple-mobile-web-app-title' content='Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..'>
        <meta name='theme-color' content='#2e0008'>

        <link rel='icon' sizes='36x36' href='http://localhost/assets/logo/android-chrome-36x36.png'>
        <link rel='icon' sizes='48x48' href='http://localhost/assets/logo/android-chrome-48x48.png'>
        <link rel='icon' sizes='72x72' href='http://localhost/assets/logo/android-chrome-72x72.png'>
        <link rel='icon' sizes='96x96' href='http://localhost/assets/logo/android-chrome-96x96.png'>
        <link rel='icon' sizes='144x144' href='http://localhost/assets/logo/android-chrome-144x144.png'>
        <link rel='icon' sizes='192x192' href='http://localhost/assets/logo/android-chrome-192x192.png'>
        <link rel='icon' sizes='256x256' href='http://localhost/assets/logo/android-chrome-256x256.png'>
        <link rel='icon' sizes='384x384' href='http://localhost/assets/logo/android-chrome-384x384.png'>
        <link rel='icon' sizes='512x512' href='http://localhost/assets/logo/android-chrome-512x512.png'>

        <meta name='msapplication-square70x70logo' content='http://localhost/assets/logo/msapplication/msapplication-square70x70logo.png' />
        <meta name='msapplication-square150x150logo' content='http://localhost/assets/logo/msapplication/msapplication-square150x150logo.png' />
        <meta name='msapplication-square310x310logo' content='http://localhost/assets/logo/msapplication/msapplication-square310x310logo.png' />

        <link rel='apple-touch-icon' href='http://localhost/assets/logo/apple-touch-icon-57x57.png'>
        <link rel='apple-touch-icon' sizes='60x60' href='http://localhost/assets/logo/apple-touch-icon-60x60.png'>
        <link rel='apple-touch-icon' sizes='72x72' href='http://localhost/assets/logo/apple-touch-icon-72x72.png'>
        <link rel='apple-touch-icon' sizes='76x76' href='http://localhost/assets/logo/apple-touch-icon-76x76.png'>
        <link rel='apple-touch-icon' sizes='114x114' href='http://localhost/assets/logo/apple-touch-icon-114x114.png'>
        <link rel='apple-touch-icon' sizes='120x120' href='http://localhost/assets/logo/apple-touch-icon-120x120.png'>
        <link rel='apple-touch-icon' sizes='144x144' href='http://localhost/assets/logo/apple-touch-icon-144x144.png'>
        <link rel='apple-touch-icon' sizes='152x152' href='http://localhost/assets/logo/apple-touch-icon-152x152.png'>
        <link rel='apple-touch-icon' sizes='180x180' href='http://localhost/assets/logo/apple-touch-icon-180x180.png'>

        <script type='application/ld+json'>
        {
            '@context': 'http://www.schema.org',
            'publisher': 'https://scarletdevilmansion.org/#organization',
            '@type': 'WebSite',
            '@id': 'https://scarletdevilmansion.org/#website',
            'mainEntityOfPage': 'https://scarletdevilmansion.org/',
            'name': 'Scarlet Devil Mansion | Türkçe Touhou şeyler Kaynağınız?..',
            'url': 'https://scarletdevilmansion.org/',
            'potentialAction':
            {
                'type': 'SearchAction',
                'query-input': 'required name=query',
                'target': 'https://scarletdevilmansion.org/functions/search/?q={query}'
            },
            'inLanguage':
            [
                {
                    '@type': 'Language',
                    'name': 'Turkish',
                    'alternateName': 'TR'
                }
            ]
        }	
        </script>

        <script type='application/ld+json'>
        {
            '@context': 'http://www.schema.org',
            '@type': 'Organization',
            '@id': 'https://scarletdevilmansion.org/#organization',
            'mainEntityOfPage': 'https://scarletdevilmansion.org/',
            'name': 'Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..',
            'url': 'https://scarletdevilmansion.org/',
            'logo':
            {
                '@type': 'ImageObject',
                '@id': 'https://scarletdevilmansion.org/#logo',
                'url': 'https://scarletdevilmansion.org/logo.png'
            }
        }	
        </script>

        <script type='application/ld+json'>
        {
            '@context': 'http://schema.org',
            '@type': 'ContactPage',
            'url': 'https://scarletdevilmansion.org/iletisim/'
        }	
        </script>

        <!----=====  Font Awesome  =====---->
        <script src='https://kit.fontawesome.com/1493595c02.js' crossorigin='anonymous'></script>

        <!----=====  Google ADS  =====---->
        <script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027' crossorigin='anonymous'></script>

        <!----===== Boxicons CSS =====---->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

        <!----===== Bootstrap CSS =====---->
        <!-- <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'> -->
    </head>

    <body style='background-color: #E4E9F7'>

        <div class='section-top-bar'>
            <img src='../../user-pictures/cover.png' height='256px' width='1580px'>
        </div>

        <div class='nav-wrapper'>
            <div class='cover-nav-wrapper'>
                <nav class='cover-nav'>
                    <ul class='cover-nav-options tabs-scrollable'>
                        <li class='cover-nav-option'>
                            <a title='Rozetler' class='cover-nav-link truncate-line' style='text-decoration: none; color: #fff;' href='#'>
                                Rozetler
                            </a>
                        </li>
                        <li class='cover-nav-option'>
                            <a title='Yorumlar' class='cover-nav-link truncate-line' style='text-decoration: none; color: #fff;' href='#'>
                                Yorumlar
                            </a>
                        </li>
                        <li class='cover-nav-option'>
                            <a title='Takip ettiği konular' class='cover-nav-link truncate-line' style='text-decoration: none; color: #fff;' href='#'>
                                Takip ettiği konular
                            </a>
                        </li>
                        <li class='cover-nav-option'>
                            <a title='Hakkında' class='cover-nav-link truncate-line' style='text-decoration: none; color: #fff;' href='../'>
                                Hakkında
                            </a>
                        </li>
                        <li class='cover-nav-option'>
                            <a title='Ayarlar' class='cover-nav-link truncate-line' style='text-decoration: none; color: #fff;' id='active'>
                                Ayarlar
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class='profile-wrapper'>
                <div class='profile-picture'>
                    <div class='profile-picture-content'>
                        <img src='../user-pictures/logo.png' width='20%'>
                        <form  action='<?php echo htmlspecialchars(".$sym."_SERVER['PHP_SELF']); ?>' method='POST'>
                            <div class='input-group mb-3'>
                                <label style='margin-left: 20px; margin-top: 5%;'>Resim JPEG formatında olmak zorundadır.</label>
                                <div class='custom-file' style='margin-left: 20px; margin-right: 60%; margin-top: 3%;'>
                                    <input type='file' class='custom-file-input' id='user-profil-picture'>
                                    <label class='custom-file-label' for='user-profil-picture' aria-describedby='inputGroupFileAddon02'>Resim Seç</label>
                                </div>
                            </div>
                        <!--<div style='margin-left: 20px; display: block;'>
                            <label style='display: block;' for='avatar'>Profil Resminizi Yükleyin:</label>
                            <input type='file' id='avatar' name='avatar'accept='image/jpeg' value='Resim Yükle'>
                        </div>-->
                        </form>
                    </div>
                </div>
                <div class='user-about'>
                    <form action='<?php echo htmlspecialchars(".$sym."_SERVER['PHP_SELF']); ?>' method='POST'>
                        <div class='user-about-content'>
                            <div class='form-group'>
                                <label for='hakkımda'>Hakkımda</label>
                                <textarea class='form-control' style='resize: none;' id='hakkımda' name='hakkimda' rows='3' maxlength='200'></textarea>
                                <span id='message_counter'>0</span><span id='count_message'>/200</span>
                            </div>
                            <script>
                                var myText = document.getElementById('hakkımda');
                                var wordCount = document.getElementById('message_counter');

                                myText.addEventListener('keyup',function(){
	                            var characters = myText.value.split('');
                                wordCount.innerText = characters.length;
                                });
                            </script>
                            
                            <div class='form-group'>
                                <label for='discord'>Discord</label>
                                <input type='text' class='form-control' name='discord' id='discord' rows='3'>
                            </div>

                            <div class='form-group'>
                                <label for='bağlantı'>Bağlantı</label>
                                <input type='text' class='form-control' id='bağlantı' name='baglanti' rows='3'>
                            </div>

                            <div class='form-group'>
                                <label for='sosyal-medya'>Sosyal Medya</label>
                                <input type='text' class='form-control' id='sosyal-medya' name='sosyal-medya' rows='3'>
                            </div>
                            <input type='submit' value='Kaydet'>
                        </div>                        
                    </form>
                </div>
                <div class='user-p-change'>
                    <div>
                    <span>Şifreni sıfırlaman için e-posta adresine bri bağlantı gönderlecek. O bağlantı ile parolanı sıfırlayabilirsin.</span>
                        <form  action='<?php echo htmlspecialchars(".$sym."_SERVER['PHP_SELF']); ?>' method='POST' style='display: flex;'>
                            <div class='user-p-content'>
                                <input type='password' name='password' placeholder='Eski Parolanı gir'>
                                <input type='submit' value='Bağlantıyı Al' style='margin-left: 25px;'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        
        <?php include '../../../../assets/footer.php'; ?>

    </body>
</html>
";

$user_setting_index_f = "
<?php

session_start();
error_reporting();


//çalıştırılan sorgunun veritabanında bir karşılığı olup olmadığı kontrol ediliyor
if(!isset(".$sym."_SESSION['loggedin']) || ".$sym."_SESSION['loggedin'] !== true){
    header('Location: ../');
    exit;
} else {
    
    if(".$sym."_SESSION['username'] != '".$username."') {
        header('Location: ../');
    } else {
        include('user.php');
    }
}

?>
";

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
  
$src = "C:/xampp/htdocs/assets/images/user-pictures";
  
$dst = "C:/xampp/htdocs/pages/u/$username/user-pictures";

custom_copy($src, $dst);

fclose($user_page);

?>