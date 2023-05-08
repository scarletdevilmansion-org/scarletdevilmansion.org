<?php
session_start();
error_reporting();

require "../../../connections/connection.php";
?>

<!DOCTYPE html>
<html lang="TR" style="font-family: 'Comic Sans MS', 'Comic Sans', cursive;">
    <head>
        <title>Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="assets/images/open-graph/yuyuko-touhou.png">
        <meta name="twitter:card" content="summary_large_image" />
        <meta property="og:url" content="https://scarletdevilmansion.org">
        <meta property="og:title" content="Malikâne Antresi">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
        <meta property="og:locale" content="TR">
        <meta name="description" content="Touhou ile ilgili türkçe içerikleri bulabileceğiniz bir, diyar? Alem? internet sitesi?...">
        <meta name="keywords" content="">
        <link rel="canonical" href="https://scarletdevilmansion.org" />

        <meta name="author" content="Hakurei Remilia">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/topic.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/scrollbar.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <script src="http://localhost/assets/assets/js/loading.js"></script>

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

        <!-- Google ADS -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script>

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

<?php
//Giriş yapılmış mı kontrol ediliyor
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    echo '
    <center>
    <div class="cover-nav-wrapper">
        <nav class="cover-nav">
            <ul class="cover-nav-options tabs-scrollable">
                <li class="cover-nav-option">
                    <a title="Forum" class="cover-nav-link truncate-line"  id="active" href="#">
                        Forum
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
                    <a title="Mangalar" class="cover-nav-link truncate-line" href="http://localhost/0/manga/">
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
    </center>
';
}
else
{
    echo '
        <div class="cover-nav-wrapper">
            <nav class="cover-nav">
                <ul class="cover-nav-options tabs-scrollable">
                    <li class="cover-nav-option">
                        <a title="Forum" class="cover-nav-link truncate-line"  id="active" href="#">
                            Forum
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
                        <a title="Mangalar" class="cover-nav-link truncate-line" href="http://localhost/0/manga/">
                            Mangalar
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Yeni Konu" class="cover-nav-link truncate-line" href="http://localhost/0/topics/new-topic/">
                            Yeni Konu
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Profil" class="cover-nav-link truncate-line" href="http://localhost/pages/u/'.$_SESSION["youkai"].'">
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
    ';
}
?>
        
        <div class="topic-m">
            <div>
                <div id="topics-p">
                    <h2>Kullanıcı Bölgesi</h2>
                    <span>Sizin bölgeniz.</span>
                    <ul>
                        <a id="w-co" href="http://localhost/0/community/forum/tr">
                            <li class="list">
                                <h4>Türkçe</h4>
                                <p>Konuşun, kaynaşın ne bilm yapın bi' şeyler...</p>
                            </li>
                        </a>
                    </ul>
                    <ul>
                        <a id="w-co" href="http://localhost/0/community/forum/en">
                            <li class="list">
                                <h4>English</h4>
                                <p>Talk, socialize, do something idk...</p>
                            </li>
                        </a>
                    </ul>
                    <ul>
                        <a id="w-co" href="http://localhost/0/community/forum/de">
                            <li class="list">
                                <h4>Deutsch</h4>
                                <p>Reden, kontakte knüpfen, etwas tun...</p>
                            </li>
                        </a>
                    </ul>
                    <ul>
                        <a id="w-co" href="http://localhost/0/community/forum/jp">
                            <li class="list">
                            <h4>日本語</h4>
                                <p>話す、会う、何でもいいただ何かをする...</p>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
<?php

include('../../../assets/footer.php');

mysqli_close($db);
?>

</html>