<?php
session_start();
error_reporting();

require "../../connections/connection.php";
?>

<!DOCTYPE html>
<html>
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

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/1493595c02.js" crossorigin="anonymous"></script>

        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
        <center>
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
                            <a title="Profil" class="cover-nav-link truncate-line" href="http://localhost/pages/u/'.$_SESSION["username"].'">
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
        </center>
    ';}?>
        <div class="topic-m">
            <div>
                <div id="topics-p">
                    <h2>Scarlet Devil Mansion</h2>
                    <span>Scarlet Devil Mansion Özel</span>
                    <ul>
                        <a id="w-co" href="http://localhost/0/topics/development/">
                            <li class="list">
                                <h4>Geliştirme</h4>
                                <p>Sitenin ilerlemesine ve gelişmesine yardım mı etmek istiyorsun? E gelsene o zaman!</p>
                                <a href="http://localhost/0/topics/development/server-side/">&#62; Sunucu tarafı geliştirme</a><a href="http://localhost/0/topics/development/client-side/">&#62; istemci tarafı geliştirme</a>
                            </li>
                        </a>
                        <a id="w-co" href="http://localhost/0/topics/user-operations/">
                            <li class="list">
                                <h4>Destek Ekibi</h4>
                                <p>Bilirsin... Kullanıcılarla uğraşacak sorumluluk sahibi bireyler gerek. Burada kullanıcıların sorunları çözülür.</p>
                            </li>
                            <ol class="list-end">
                                <i class="fa-solid fa-message fa-2xl"></i>
                            </ol>
                        </a>
                    </ul>
                    <h2>Kullanıcılardan</h2>
                    <span>Sizin bölgeniz.</span>
                    <ul>
                        <a id="w-co" href="http://localhost/0/community/forum/">
                            <li class="list">
                                <h4>Forum</h4>
                                <p>Değerli kullanıcılarımızın kendi aralarında sohbet edebilecekleri bir bölge.</p>
                            </li>
                        </a>
                    </ul>
                    <h2>Touhou Danmaku Oyunları</h2>
                    <span>O çok sevdiğiniz, bayıldığınız oyunlar.</span>
                    <ul>
                        <li class="list">
                            <h4>PC-98 Oyunları</h4>
                            <p>Touhou'da ilk çıkan 5 oyun.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 1</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 2</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 3</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 4</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 5</a>
                        </li>
                        <li class="list">
                            <h4>1. Nesil Oyunlar</h4>
                            <p>1. nesil oyunlar, 6 ve 9.5'da dahil olmak üzere arasındaki oyunları kapsar.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 6</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 7</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 8</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 9</a>
                        </li>
                        <li class="list">
                            <h4>2. Nesil Oyunlar</h4>
                            <p>2. nesil oyunlar, 10 ve 12.5'da dahil olmak üzere arasındaki oyunları kapsar.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 10</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 11</a>
                        <li class="list">
                            <h4>3. Nesil Oyunlar</h4>
                            <p>3. nesil oyunlar, 12.8 ve 18'de dahil olmak üzere arasındaki oyunları kapsar.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 12.8</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 13</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 18</a>
                        </li>
                    </ul>
                    <h2>Touhou Dövüş Oyunları</h2>
                    <span>Alışılmış danmakunun dışına çıkan oyuncular.</span>
                    <ul>
                        <li class="list">
                            <h4>PC-98 Oyunları</h4>
                            <p>Touhou'da ilk çıkan 5 oyun.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 1</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 2</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 3</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 4</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 5</a>
                        </li>
                        <li class="list">
                            <h4>1. Nesil Oyunlar</h4>
                            <p>1. nesil oyunlar, 6 ve 9.5'da dahil olmak üzere arasındaki oyunları kapsar.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 6</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 7</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 8</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 9</a>
                        </li>
                        <li class="list">
                            <h4>2. Nesil Oyunlar</h4>
                            <p>2. nesil oyunlar, 10 ve 12.5'da dahil olmak üzere arasındaki oyunları kapsar.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 10</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 11</a>
                        <li class="list">
                            <h4>3. Nesil Oyunlar</h4>
                            <p>3. nesil oyunlar, 12.8 ve 18'de dahil olmak üzere arasındaki oyunları kapsar.</p>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 12.8</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 13</a>
                            <a href="http://localhost/0/topics/development/server-side/">&#62; Touhou 18</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<?php

include('../../assets/footer.php');
mysqli_close($db);
?>

</html>