<?php
session_start();
error_reporting();

mkdir("../$param_topic_url/");
$topic_index = fopen("../" . $param_topic_url . "/index.php", "w") or die("Dosya oluştuma başarısız.");

$topic_index_eb =
'<?php
session_start();
require_once $_SERVER[\'DOCUMENT_ROOT\'] . \'/connections/databaseconnect.php\';
include $_SERVER[\'DOCUMENT_ROOT\'] . \'/functions/bbcode.php\';

if( isset($_POST["submit"]) )
{
    $tpc_id = $_POST["tpc_id"];
    $user_comment_name = $_SESSION[\'youkai\'];
    $user_comment = $_POST["comment"];

    if($sth = $db->prepare("INSERT INTO comments (tpc_id, user_id, comment) VALUES (:tpc_id, :user_id, :comment)"))
    {
        $sth->bindParam("tpc_id", $tpc_id, PDO::PARAM_STR);
        $sth->bindParam("user_id", $user_comment_name, PDO::PARAM_STR);
        $sth->bindParam("comment", $user_comment, PDO::PARAM_STR);
        $sth->execute();

        //include "topic-create.php";
    }
    echo "<meta http-equiv=\'refresh\' content=\'0\'>";
    unset($_POST["submit"]);
}
?><!DOCTYPE html>
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
        <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script> -->
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
                    <img src="http://localhost/pages/u/'.$param_topic_owner.'/user-pictures/logo.png" width="144px" alt="Kyaleina">
                </div>
                <div class="user-name">
                    <a href="http://localhost/pages/u/'.$param_topic_owner.'/">
                        <h4>' . $isim . ' ' . $soy_isim . '</h4>
                    </a>
                </div>
            </div>
            <div class="content">
                <?php
                $posts2 = $db->query("SELECT * FROM topics as t WHERE t.topic_url = \''.  $param_topic_url .'\'")->fetchAll(PDO::FETCH_ASSOC);
                foreach($posts2 as $post2):
                ?>
                    <div class="page-header">
                        <h1><?php echo $post2["title"]; ?></h1>
                    </div>
                    <ol>
                        <p><?php echo bbCode($post2["content"]); ?></p>
                    </ol>
                    <?php endforeach; ?>
            </div>
        </div>
        <?php
        $comments = $db->query("SELECT * FROM comments as cs WHERE cs.tpc_id = \''.$param_topic_url.'\' ORDER BY time ASC")->fetchAll(PDO::FETCH_ASSOC);
        foreach($comments as $comment):
        ?>
        <div class="comment">
            <div class="comment-user">
                <div class="user-avatar">
                    <img src="http://localhost/pages/u/<?php echo $comment["user_id"]; ?>/user-pictures/logo.png" width="48px" alt="<?php echo $comment["user_id"]; ?>">
                </div>
                <div class="user-name">
                    <a href="http://localhost/pages/u/<?php echo $comment["user_id"]; ?>">
                        <h4><?php echo $comment["user_id"]; ?></h4>
                    </a>
                </div>
            </div>
            <div class="comment-content">
                <p><?php echo bbCode($comment["comment"]); ?><sup><?php echo "Yorum Zamanı: ". str_replace("-", "", $comment["time"]); ?></sup></p>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="comment-form">
            <form action="<?php echo $_SERVER[\'PHP_SELF\']; ?>" method="POST">
                <textarea name="comment" id="comment" placeholder="Yorumunuzu yazın..."></textarea>
                <input type="hidden" name="tpc_id" value="'.$param_topic_url.'">
                <?php
                $_POST["submit"] = NULL;
                $_SERVER["REQUEST_METHOD"] = "";
                $_SERVER["REQUEST_METHOD"] = NULL;
                ?>
                <button type="submit" name="submit">Yorum Yap</button>
            </form>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"] . \'/assets/footer.php\';  ?>
    </body>

</html>';

fwrite($topic_index, $topic_index_eb);

fclose($topic_index );