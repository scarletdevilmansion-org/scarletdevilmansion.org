<?php
session_start();
error_reporting();

require_once "../../connections/connection.php";

include "../../functions/bbcode.php";
/*
//çalıştırılan sorgunun veritabanında bir karşılığı olup olmadığı kontrol ediliyor
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('Location: http://localhost/');
    exit;
}*/

?>
<!DOCTYPE html>
<html lang="TR" style="font-family: Rosarivo;">
    <head>
        <title>Sohbet | Scarlet Devil Mansion</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="assets/images/open-graph/yuyuko-touhou.png">
        <meta name="twitter:card" content="summary_large_image" />
        <meta property="og:url" content="https://scarletdevilmansion.org/pages/chat">
        <meta property="og:title" content="SDM Kafeterya">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Sohbet | Scarlet Devil Mansion">
        <meta property="og:locale" content="TR">
        <meta name="description" content="Başkalarının ruhuna dokunun. Tabii ki sohbet ederek... -Beta-">
        <meta name="keywords" content="Scarlet Devil Mansion, Sohbet, SDM Chat">
        <link rel="canonical" href="https://scarletdevilmansion.org" />

        <meta name="author" content="Hakurei Remilia">
        <link rel="stylesheet" href="http://localhost/assets/css/chat.css" />

        <link rel="alternate" type="application/rss+xml" title="Latest File" href="https://scarletdevilmansion.org/rss/#" />
        <link rel="alternate" type="application/rss+xml" title="Latest Videos" href="https://scarletdevilmansion.org/rss/#" />
        <link rel="alternate" type="application/rss+xml" title="Recent Topic" href="https://scarletdevilmansion.org/rss/#" />
        <link rel="alternate" type="application/rss+xml" title="Latest Image" href="https://scarletdevilmansion.org/rss/#" />

        <link rel="manifest" href="http://localhost/assets/manifest.webmanifest/">
        <meta name="msapplication-config" content="http://localhost/assets/browserconfig.xml/">
        <meta name="msapplication-starturl" content="/">
        <meta name="application-name" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
        <meta name="apple-mobile-web-app-title" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
        <meta name="theme-color" content="#2e0008">

        <link rel="icon" sizes="36x36" href="http://localhost/assets/logo/android-chrome-36x36.png">
        <link rel="icon" sizes="48x48" href="http://localhost/assets/logo/android-chrome-48x48.png">
        <link rel="icon" sizes="72x72" href="http://localhost/assets/logo/android-chrome-72x72.png">
        <link rel="icon" sizes="96x96" href="http://localhost/assets/logo/android-chrome-96x96.png">
        <link rel="icon" sizes="144x144" href="http://localhost/assets/logo/android-chrome-144x144.png">
        <link rel="icon" sizes="192x192" href="http://localhost/assets/logo/android-chrome-192x192.png">
        <link rel="icon" sizes="256x256" href="http://localhost/assets/logo/android-chrome-256x256.png">
        <link rel="icon" sizes="384x384" href="http://localhost/assets/logo/android-chrome-384x384.png">
        <link rel="icon" sizes="512x512" href="http://localhost/assets/logo/android-chrome-512x512.png">

        <meta name="msapplication-square70x70logo" content="http://localhost/assets/logo/msapplication/msapplication-square70x70logo.png" />
        <meta name="msapplication-square150x150logo" content="http://localhost/assets/logo/msapplication/msapplication-square150x150logo.png" />
        <meta name="msapplication-square310x310logo" content="http://localhost/assets/logo/msapplication/msapplication-square310x310logo.png" />

        <link rel="apple-touch-icon" href="http://localhost/assets/logo/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="http://localhost/assets/logo/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="http://localhost/assets/logo/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="http://localhost/assets/logo/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="http://localhost/assets/logo/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="http://localhost/assets/logo/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="http://localhost/assets/logo/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://localhost/assets/logo/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/assets/logo/apple-touch-icon-180x180.png">

        <script type='application/ld+json'>
        {
            "@context": "http://www.schema.org",
            "publisher": "https://scarletdevilmansion.org/#organization",
            "@type": "WebSite",
            "@id": "https://scarletdevilmansion.org/#website",
            "mainEntityOfPage": "https://scarletdevilmansion.org/",
            "name": "Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..",
            "url": "https://scarletdevilmansion.org/",
            "potentialAction":
            {
                "type": "SearchAction",
                "query-input": "required name=query",
                "target": "https://scarletdevilmansion.org/search/?q={query}"
            },
            "inLanguage":
            [
                {
                    "@type": "Language",
                    "name": "Turkish",
                    "alternateName": "TR"
                }
            ]
        }	
        </script>

        <script type='application/ld+json'>
        {
            "@context": "http://www.schema.org",
            "@type": "Organization",
            "@id": "https://scarletdevilmansion.org/#organization",
            "mainEntityOfPage": "https://scarletdevilmansion.org/",
            "name": "Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..",
            "url": "https://scarletdevilmansion.org/",
            "logo":
            {
                "@type": "ImageObject",
                "@id": "https://scarletdevilmansion.org/#logo",
                "url": "https://scarletdevilmansion.org/logo.png"
            }
        }	
        </script>

        <script type='application/ld+json'>
        {
            "@context": "http://schema.org",
            "@type": "ContactPage",
            "url": "https://scarletdevilmansion.org/iletisim/"
        }	
        </script>

        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/1493595c02.js" crossorigin="anonymous"></script>

        <!-- Google ADS -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script>

        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    

        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script type="text/javascript">
        var onloadCallback = function()
        {
            grecaptcha.render('html_element',
            {
                'sitekey' : '6LduPMMgAAAAAFKqfxM01xyBypZbHATlEvv3_A6M',
                'theme' : 'dark'
            });
        };
        </script>

    </head>        
    
    <body>
        <center>
<?php
    $result = $db->query("SELECT siteuser_id, comment, created_at FROM user_comment WHERE status = 0 ORDER BY created_at ASC");
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            echo '
            <table class="table border" style="width: 60%;">
                <tr>
                    <td class="border" style="width: 15%; padding: 10px;">
                        <img src="http://localhost/pages/u/' . $row['siteuser_id'] . '/user-pictures/logo.png" style="border: 3px solid pink;">
                    </td>
                    <td rowspan="2">
                        ' . bbCode($row['comment']) . '
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <span><b>' . $row['siteuser_id'] . '</b></span>
                    </td>
                </tr>
            </table>
            ';
        }
    }
    else
    {
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
        {
            echo '
            <table class="table border" style="width: 60%;">
                <tr>
                    <td class="border" style="width: 15%; padding: 10px;">
                        <img src="../u/user-pictures/logo.png" style="border: 3px solid pink;">
                    </td>
                    <td rowspan="2">
                        <p style="margin-bottom: 120px;">üzgün değilim ama yorum yapamazsın.</p>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <span><b>SDM Member</b></span>
                    </td>
                </tr>
            </table>
            ';
        }
        else
        {
            echo '
            <form action="comment.php" method="post">
                <table class="table border" style="width: 60%;">
                    <tr>
                        <td class="border" style="width: 15%; padding: 10px;">
                            <img src="../u/-remilia.scarlet/user-pictures/e52fgn4d62saf435l7a2g47ty245ty2.png" style="border: 3px solid pink;">
                        </td>
                        <td>
                            <textarea class="border" id="comment" name="comment"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="border">
                            <span><b>SDM Member</b></span>
                        </td>
                        <td>
                            <input type="submit" style="float: right;" value="Gönder">
                        </td>
                    </tr>
                </table>
            </form>
            ';
        }
    }
?>

            
            
        </center>
        <?php
        include('../../assets/footer.php');
        mysqli_close($db);
        ?>
    </body>
</html>