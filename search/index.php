<?php
session_start();
error_reporting(0);

require "../connections/connection.php";


$get_query = $_GET['q'];

if(empty($_GET['q']))
{
    $get_query = "";
}
else if($get_query == '*')
{
    $result = $db->query("SELECT * FROM user_topic");
}
else
{
    $result = $db->query("SELECT * FROM user_Topic 
    WHERE `topic_name` LIKE '%".$get_query."%' 
    OR lower(`topic_name`) LIKE '%".$get_query."%' 
    OR upper(`topic_name`) LIKE '%".$get_query."%'");
}

if(empty($_GET['q']))
{
    $query = "Burada Touhou ile ilgili bir şeyler arayabilirsiniz.";
}
else
{
    $query = $_GET['q'].", ile ilgili sonuçlar.";
}


?>
<!DOCTYPE html>
<html lang="TR">
    <head>
        <meta charset="UTF-8">
        <title>Ara Beni Bul Beni</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $query;?>">
        <meta name="keywords" content="SDM Arama Motoru, Ara">
        <meta property="og:image" content="assets/images/open-graph/yuyuko-touhou.png">
        <meta property="og:url" content="https://www.scarletdevilmansion.org">
        <meta property="og:title" content="Ara Beni Bul Beni">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
        <meta property="og:locale" content="TR">
        <link rel="canonical" href="https://www.scarletdevilmansion.org" />
        <meta name="author" content="Remilia Sc4rlet">
        
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="../../assets/css/search.css">
        <link rel="stylesheet" href="../../assets/css/loading.css">
        <script src="../../assets/js/loading.js"></script>
        <script src="https://kit.fontawesome.com/1493595c02.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <center>
                <div class="cover-nav-wrapper">
                    <nav class="cover-nav">
                        <ul class="cover-nav-options tabs-scrollable">
                            <li class="cover-nav-option">
                                <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="http://localhost/0/topics">
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
                        </ul>
                    </nav>
                </div>
            </center>
        <center>
            <h3>Aramak için Bul</h3>
            <form action="?" method="get">
                <input type="text" name="q" pattern="[^'\x22]+">
                <button type="submit"><i class="fa-inverse fa-solid fa-magnifying-glass"></i></button>
            <form>
            <?php
                if($get_query == "")
                {
                    echo '
                        <table>
                            <tr>
                                <td>E Ne Bekliyorsun?</td>
                            </tr>
                            <tr>
                                <td>Bir şeyler aramaz mısın?</td>
                            </tr>
                        </table>
                    ';
                }
                else
                {
                    $min_length = 3;

                    if(strlen($get_query) >= $min_length)
                    {
                        $get_query = htmlspecialchars($get_query); 
                        // changes characters used in html to their equivalents, for example: < to &gt;
                        
                        $get_query = $db->real_escape_string($get_query);
                        // makes sure nobody uses SQL injection
                        echo '
                            <table>
                                    <tr>
                                        <td>Aradığınız şey: "'.$get_query.'"</td>
                                    </tr>
                                </table>
                                ';

                        if ($result->num_rows > 0)
                        {
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {
                            echo '
                                <table>
                                    <tr>
                                        <td colspan="2"><a href="' . $row["topic_url"] . '">' . $row["topic_url"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Başlık</td><td>Konu Sahibi</td>
                                    </tr>
                                    <tr>
                                        <td>' . $row["topic_name"] . '</td><td>' . $row["user_id"] . '</td>
                                    </tr>
                                </table>
                                ';
                            }
                        }
                        else
                        {
                            echo '
                                <table>
                                    <tr>
                                        <td>Üzgünüz...</td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>Aradığınla ilgili bir şey bulamadık... Sitenin karanlık tarafına düşmüş olabilir..</td>
                                    </tr>
                                </table>
                            ';
                        }
                    }
                    else
                    {
                        echo '
                                <table>
                                    <tr>
                                        <td>Oops</td>
                                    </tr>
                                    <tr>
                                        <td>En az 3 harf kullanman gerek.</td>
                                    </tr>
                                </table>
                            ';
                    }
                }
            ?>
    <?php include('../assets/footer.php');?>
        </center>
    </body>
</html>