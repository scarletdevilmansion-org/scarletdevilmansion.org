<?php
session_start();
error_reporting();

/* if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: http://localhost/v2/login/");
    exit;
} */

?><!DOCTYPE html>
<html>
    <head>
        <title>Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Touhou ile ilgili türkçe içerikleri bulabileceğiniz bir, diyar? Alem? internet sitesi?...">
        <meta name="keywords" content="">
        <link rel="canonical" href="https://www.scarletdevilmansion.org" />

        <meta name="author" content="Remilia Sc4rlet">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/new-topic.css?v=2" />
        <link rel="stylesheet" href="http://localhost/assets/css/scrollbar.css" />

        <link rel="icon" sizes="36x36" href="http://localhost/assets/logo/android-chrome-36x36.png">

        <!-- Google ADS -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script>
    
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

        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <script src="http://localhost/assets/js/loading.js"></script>

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
                            <a title="Forum" class="cover-nav-link truncate-line" href="http://localhost/0/community/forum/tr/">
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
                            <a title="Forum" class="cover-nav-link truncate-line" href="http://localhost/0/community/forum/tr/">
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
    }?>
        <div class="topic-header">
            <form action="process.php" method="POST">
                <div class="form-control">
                    <center>
                        <select class="category" name="topic-category" required>
                            <option value="Genel">Genel</option>
                            <option value="Oyunlar">Oyunlar</option>
                            <option value="Mangalar">Mangalar</option>
                            <option value="Müzikler">Müzikler</option>
                            <option value="Videolar">Videolar</option>
                            <option value="Sohbet">Sohbet</option>
                            <option value="Yardım">Yardım</option>
                        </select>
                    </center>
                    <div class="input-control">
                        <input class="input-title" type="text" name="topic-title"
                        contenteditable="true" maxlength="50"
                        placeholder="Konu Başlığını Buraya Yaz" required>
                    </div>
                    <div class="textarea-control">
                        <textarea class="input-content" name="topic-content"
                        contenteditable="true" style="white-space: pre-wrap;"
                        placeholder="Gönderi içeriğini buraya yaz" required></textarea>
                        <div id="editor">
                            <span>Yazı özellikleri çalışmıyor ve bunun için üzgün değilim. Koskoca siteyi tek başıma yapmaya çalışıyorum. Renk verme biçimlendirme ve benzer işlemler için lütfen BBCode kullanın. Rehber için <a href="http://localhost/pages/rehber/bbcode" style="text-decoration: none; color: yellow;">Tıklayın</a>. Editör kullanımı için ise buraya <a href="http://localhost/pages/rehber/editor-kullanimi" style="text-decoration: none; color: yellow;">Tıklayın</a>.</span>
                        </div>
                    </div>
                </div>
                <div>
                    <input class="submit-control" type="submit" name="submit" value="Gönder" onclick="divide()">
                </div>
                <script src="../../../../../assets/js/rich-text-script.js"></script>
            </form>
            <script src="../../../../../assets/js/rich-text-script.js"></script>
        </div>
        
<?php
    include('../../../../../assets/footer.php');
?>

</html>