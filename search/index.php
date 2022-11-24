<?php
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

/* * if(empty($_GET['q']))
 *   {
 *       $post_query = $query;
 *   }
 *   else if(empty($_POST['q']))
 *   {
 *       $get_query = $query;
 *   }
 *   else
 *   {
 *       $query = "";
 *   }
 */
?>
<!DOCTYPE html>
<html lang="TR">
<head>
    <meta charset="UTF-8">
    <title>Ara Beni Bul Beni</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Touhou ile ilgili bir şeyler arayabilirsin burada.">
    <meta name="keywords" content="SDM Ara, Ara">
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:image" content="assets/images/open-graph/yuyuko-touhou.png">
    <meta property="og:url" content="https://scarletdevilmansion.org">
    <meta property="og:title" content="Malikâne Antresi">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
    <meta property="og:locale" content="TR">
    <link rel="canonical" href="https://scarletdevilmansion.org" />
    <meta name="author" content="Hakurei Remilia">

    <link rel="stylesheet" href="../../assets/css/search.css">
    <link rel="stylesheet" href="../../assets/css/loading.css">
    <script src="../../assets/js/loading.js"></script>
    <script src="https://kit.fontawesome.com/1493595c02.js" crossorigin="anonymous"></script>
</head>
    <body>
        <center>
            <h3>Aramak için Bul</h3>
            <form action="?" method="get">
                <input type="text" name="q">
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

                        if ($result->num_rows > 0) {
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
            <div style="width: 56.5%; margin-right: 70px;">
                <?php include('../assets/footer.php');?>
            </div>
        </center>
        
    </body>
</html>