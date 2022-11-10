<?php 


include '../connections/connection.php';

header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>https://www.scarletdevilmansion.org/</loc>
        <lastmod>2022-12-01</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>

    <?php

    $entries = $db->query("SELECT * FROM sitemap");

    while($row = $entries->fetch_assoc())
    {
        $title = stripslashes($row['title']);
        $date = date("Y-m-d", strtotime($row['timestamp']));

        echo "
            <url>
                <loc>".$title."</loc>
                <lastmod>".$date."</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.6</priority>
            </url>
        ";

    }

    $user_url = $db->query("SELECT * FROM users");

    while($row = $user_url->fetch_assoc())
    {
        $title = stripslashes($row['username']);
        $date = date("Y-m-d", strtotime($row['created_at']));

        echo "
            <url>
                <loc>https://www.scarletdevilmansion.org/pages/u/".$title."</loc>
                <lastmod>".$date."</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.6</priority>
            </url>
        ";

    }

    $topic_url = $db->query("SELECT * FROM user_topic");

    while($row = $topic_url->fetch_assoc())
    {
        $title = stripslashes($row['topic_url']);
        $date = date("Y-m-d", strtotime($row['created_at']));

        echo "
            <url>
                <loc>".$title."</loc>
                <lastmod>".$date."</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.6</priority>
            </url>
        ";

    }

    ?>

</urlset>