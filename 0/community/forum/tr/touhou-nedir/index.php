<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/connections/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions/bbcode.php';

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
        <meta name="description" content="Touhou ile ilgili türkçe içerikleri bulabileceğiniz bir, diyar? Alem? internet sitesi?...">
        <meta name="keywords" content="">
        <link rel="canonical" href="https://www.scarletdevilmansion.org" />

        <meta name="author" content="Hakurei Remilia">
        <link rel="icon" type="image/x-icon" href="http://localhost/favicon.ico">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/threads.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/scrollbar.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <script src="http://localhost/assets/assets/js/loading.js"></script>

        <link rel="manifest" href="http://localhost/assets/manifest.webmanifest/">
        <link rel="icon" sizes="36x36" href="http://localhost/assets/logo/android-chrome-36x36.png">
        <!-- Google ADS -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script>
    </head>

    <body>
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
                        <a title="Müzikler" class="cover-nav-link truncate-line" href="#">
                            Müzikler
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
        <div class="main">
            <div class="user">
                <div class="user-avatar">
                    <img src="http://localhost/pages/u/remilia.scarlet/user-pictures/logo.png" width="144px" alt="Kyaleina">
                </div>
                <div class="user-name">
                    <a href="http://localhost/pages/u/remilia.scarlet/">
                        <h4>Kyaleina</h4>
                    </a>
                </div>
            </div>
            <div class="content">
                <?php
                $result = $db->query("SELECT * FROM user_topic where user_id = 'remilia.scarlet'");
                $apostrophe = "'";
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    echo '
                    <div class="page-header">
                        <h1>'.$row["topic_name"].'</h1>
                    </div>
                    <ol>
                        <p>' . bbCode($row["topic_content"]) . ' </p>
                    </ol>';
                    
                }?>
            </div>
        </div>
            <?php
            $result = $db->query("SELECT * FROM user_comment");
            $apostrophe = "'";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                echo '
                <div class="comment">
                    <div class="comment-user">
                        <div class="user-avatar">
                            <img src="http://localhost/pages/u/'.$row["siteuser_id"].'/user-pictures/logo.png" width="64px" alt="'.$row["siteuser_id"].'">
                        </div>
                        <div class="user-name">
                            <a href="http://localhost/pages/u/'.$row["siteuser_id"].'/">
                                <h4>'.$row["siteuser_id"].'</h4>
                            </a>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>' . bbCode($row["comment"]) . ' </p>
                    </div>
                </div>';
                }
            }?>
        <div class="comment-form">
            <form action="" method="POST">
                <textarea name="comment" id="comment" placeholder="Yorumunuzu yazın..."></textarea>
                <input type="hidden" name="topic_id" value="touhou-nedir">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION["username"]?>">
                <button type="submit">Yorum Yap</button>
            </form>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.php';  ?>
    </body>

</html>