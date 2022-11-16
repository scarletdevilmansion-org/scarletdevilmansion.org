<?php
error_reporting();

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
    <link rel="stylesheet" href="../../assets/css/search.css">
    <link rel="stylesheet" href="../../assets/css/loading.css">
    <script src="../../assets/js/loading.js"></script>
    <script src="https://kit.fontawesome.com/1493595c02.js" crossorigin="anonymous"></script>
</head>
    <body>
        <center>
            <h3>Bulmak için ara</h3>
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
                                <td>E Ne Beliyorsun?</td>
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
        </center>
    </body>
</html>