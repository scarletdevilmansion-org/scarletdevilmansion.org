<?php
session_start();
error_reporting(0);

require_once('../../connections/connection.php');
include('bbcode.php');

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oyunlar</title>
    <meta name="description" content="Touhou Oyunları. PC98 ve Windows 1. 2. 3. nesil oyunları burada bulabilirsiniz.">
    <meta name="keywords" content="Scarlet Devil Mansion | Touhou Oyunları">
    <link rel="stylesheet" href="../../assets/css/oyunlar.css">
</head>
<body>
    <div class="section-1">
        <center><h>Oyunlar</h></center>
    </div>
    <div class="comment-section">
        <form action="commenter.php" method="POST">
            <div class="comment-form">
            <?php
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                echo '
                <img src="http://localhost/assets/images/user-pictures/logo.png" width="76px">
                <label style="color: darkblue; margin-left: 15px; margin-top: 19px;">Önce oturum açman gerekli.</label>
                ';
            }
            else
            {
                echo
                '
                <img style="width: 10%; height: 10%;" src="http://localhost/pages/u/' . $_SESSION['username'] . '/user-pictures/logo.png">
                <textarea class="input-text" type="text" name="comment" rows="4" cols="50" placeholder="Yorumunu buraya yaz"></textarea>
                <br>
                <button id="input-button" type="submit" name="submit"> Send </button>
                ';                               
            }
            ?>
            </div>
        </form>
        <?php

        $result = $db->query("SELECT siteuser_id, comment, created_at FROM user_comment ORDER BY created_at DESC");

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
            echo '
            <div style="height: auto; display: flex; margin: 30px 0px 35px 45px;">
                <div style="padding: 8px 8px 4px 8px; display: inline-block; width: 96px; border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-top: black 2px solid; border-left: black 2px solid; border-bottom: black 2px solid; background-color: #c453c0;">
                    <img style="width: inherit; height: auto;"src="http://localhost/pages/u/' . $row['siteuser_id'] . '/user-pictures/logo.png">
                </div>
                <div style="padding-top: 10px; display: inline-block; width: 1193px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border: black 2px solid; background-color: #2c61d3; margin-right: 50px;">
                    <span style="margin-left: 10px; color: #f5f5f5;">' . $row['siteuser_id'] . '</span>
                    <sup style="font-size: 10px; color: #d16a45;">' . $row['created_at'] . '</sup>
                    <p style="margin-left: 15px; padding-right: 50px;">' . bbCode($row['comment']) . '</p>
                </div>
            </div>
            <br>';
            }
        }
        else
        {
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === true)
            {
                echo '<span style="color: darkblue; margin-left: 110px;">Hiç yorum yapılmamış. ilk olmak ister misin >w< ?</span>';
            }
        }
        ?>

    </div>
    <?php include('../../assets/footer.html'); ?>

    </body>
</html>