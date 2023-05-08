<?php
session_start();
error_reporting();

require "../../../../connections/connection.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="http://localhost/assets/images/open-graph/yuyuko-touhou.png">
        <meta name="twitter:card" content="summary_large_image" />
        <meta property="og:url" content="https://www.scarletdevilmansion.org">
        <meta property="og:title" content="Malikâne Antresi">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
        <meta property="og:locale" content="TR">
        <meta name="description" content="Touhou ile ilgili türkçe içerikleri bulabileceğiniz bir, diyar? Alem? internet sitesi?...">
        <meta name="keywords" content="">
        <link rel="canonical" href="https://www.scarletdevilmansion.org" />

        <meta name="author" content="Hakurei Remilia">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/topic.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/scrollbar.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <script src="http://localhost/assets/assets/js/loading.js"></script>

        <link rel="alternate" type="application/rss+xml" title="Latest File" href="https://www.scarletdevilmansion.org/rss/#" />
        <link rel="alternate" type="application/rss+xml" title="Latest Videos" href="https://www.scarletdevilmansion.org/rss/#" />
        <link rel="alternate" type="application/rss+xml" title="Recent Topic" href="https://www.scarletdevilmansion.org/rss/#" />
        <link rel="alternate" type="application/rss+xml" title="Latest Image" href="https://www.scarletdevilmansion.org/rss/#" />

        <link rel="manifest" href="http://localhost/assets/manifest.webmanifest/">
        <meta name="msapplication-config" content="http://localhost/assets/browserconfig.xml/">
        <meta name="msapplication-starturl" content="/">
        <meta name="application-name" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
        <meta name="apple-mobile-web-app-title" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">

        <link rel="icon" sizes="36x36" href="http://localhost/assets/logo/android-chrome-36x36.png">

        <!-- Google ADS -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script>

    </head>

    <body>
<?php
    //Giriş yapılmış mı kontrol ediliyor
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        $new_thread = '
                    <table>
                        <td>
                            <tr>
                                <a id="new-topic-button" style="cursor: not-allowed;">
                                      Önce Giriş Yapmalısın  
                                </a>
                            </tr>
                        </td>
                    </table>
        ';
        echo '
        <center>
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Forum" class="cover-nav-link truncate-line"href="http://localhost/0/community/forum/tr/">
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
                            <a title="Giriş Yap" class="cover-nav-link truncate-line" href="http://localhost/v2/login/">
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
        $new_thread = '
                    <table>
                        <td>
                            <tr>
                                <a id="new-topic-button" href="http://localhost/0/community/forum/tr/new-topic/">
                                     <i class="fa-solid fa-plus fa-sm"></i> Yeni Konu Aç  
                                </a>
                            </tr>
                        </td>
                    </table>
        ';
        echo '
        <center>
            <div class="cover-nav-wrapper">
                <nav class="cover-nav">
                    <ul class="cover-nav-options tabs-scrollable">
                        <li class="cover-nav-option">
                            <a title="Forum" class="cover-nav-link truncate-line"  id="active" href="http://localhost/0/community/forum/tr/">
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
                            <a title="Profil" class="cover-nav-link truncate-line" href="http://localhost/pages/u/'.$_SESSION["youkai"].'">
                                Profil
                            </a>
                        </li>
                        <li class="cover-nav-option">
                            <a title="Çıkış Yap" class="cover-nav-link truncate-line" href="http://localhost/v2/logout/">
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
        ';
    }
?>
        
        <div class="topic-m">
            <div>
                <div id="topics-p">
                    <h2>Türkçe Forum Bölgesi</h2>
                    <span>Sabitlenmiş Konular</span>
                    <sup>Turkish</sup>
                    <ul>
                        <table>
                            <tr>
                                <td>
                                    <a id="w-co" href="http://localhost/0/community/forum/tr/forumda-dikkat-edilmesi-gereken-kurallar">
                                        <li class="list">
                                            <h4>Forumda Dikkat Edilmesi Gereken Kurallar~</h4>
                                            <p><a href="http://localhost/pages/u/remilia.scarlet/">remilia.scarlet</a> tarafından.</p>
                                        </li>
                                    </a>
                                </td>
                                <td>
                                    <ol class="list-icon">
                                        <i class="fa-solid fa-message fa-2xl"></i>
                                    </ol>
                                </td>
                            </tr>
                        </table>
                    </ul>
                </div>
                <div id="topics-p">
                    <h2>Konular</h2>
                    <br>
                    <?php echo $new_thread; ?>
            <?php
            //WHERE topic_lang = 'tr' ORDER BY created_at DESC
            $result = $db->query("SELECT * FROM topics");
            $apostrophe = "'";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                echo '
                    <ul>
                        <table>
                            <tr>
                                <td>
                                    <a id="w-co" href="http://localhost/0/community/forum/tr/' . $row["topic_url"] . '">
                                        <li class="list">
                                            <h4>' . $row["title"] . '</h4>
                                            <p><a href="http://localhost/pages/u/' . $row["user_id"] . '/">'    . $row["user_id"] . '</a> tarafından.</p>
                                        </li>
                                    </a>
                                </td>
                                <td>
                                    <ol class="list-pw">
                                        <p>' . $row["time"] . ' tarihinde oluşturuldu</p>
                                        <p>';
                                        if($row["comments"]<1)
                                        {
                                            echo "Hiç yorum yok";
                                        } else
                                        {
                                            echo $row["comments"] . ' tane gönderi';
                                        }
                                        echo '</p>
                                    </ol>
                                </td>
                                <td>
                                    <ol class="list-icon">
                                        <i class="fa-solid fa-message fa-2xl"></i>
                                    </ol>
                                </td>
                            </tr>
                        </table>
                    </ul>
                ';}}?></div>
            </div>
        </div>
<?php
    include('../../../../assets/footer.php');
    mysqli_close($db);
?>

</html>