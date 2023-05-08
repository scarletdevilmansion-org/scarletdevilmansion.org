<!DOCTYPE html>
<html lang="TR">
    <head>
        <title>Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="description" content="Touhou ile ilgili türkçe içerikleri bulabileceğiniz bir, diyar? Alem? internet sitesi?...">
        <meta name="keywords" content="">
        <meta property="og:image" content="assets/images/open-graph/yuyuko-touhou.png">
        <meta property="og:url" content="https://scarletdevilmansion.org">
        <meta property="og:title" content="Malikâne Antresi">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Scarlet Devil Mansion | Türkçe Touhou Şeyler Kaynağınız?..">
        <meta property="og:locale" content="TR">
        <link rel="canonical" href="https://scarletdevilmansion.org" />

        <meta name="author" content="Hakurei Remilia">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css?v=1" /> 
        <link rel="stylesheet" href="http://localhost/assets/css/pfp.css" /> 
        <link rel="stylesheet" href="http://localhost/assets/css/main.css" />
        
        <!-- Page load things -->
        <link rel="stylesheet" href="assets/css/loading.css">
        <script src="assets/js/loading.js"></script>
        <!-- Page load things END -->

        <link rel="icon" type="image/x-icon" href="http://localhost/assets/images/logo.ico">

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

        <!-- Google ADS -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3314538898493027" crossorigin="anonymous"></script>

        <!-- Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="cover-nav-wrapper">
            <nav class="cover-nav">
                <ul class="cover-nav-options tabs-scrollable">
                    <li class="cover-nav-option">
                        <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="#">
                            Ana Sayfa
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Forum" class="cover-nav-link truncate-line" href="http://localhost/0/community/forum/">
                            Forum
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Arşiv" class="cover-nav-link truncate-line" href="http://localhost/pages/archive/">
                            Arşiv
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        
                    </li>
                    <li class="pf cover-nav-option">
                        <div class="pf-btn cover-nav-link truncate-line">
                            <img class="pfp" src="http://localhost/pages/u/<?php echo $_SESSION['youkai'] ?>/user-pictures/logo.png" alt="Profil Resmi">
                            <p><?php echo $_SESSION['youkai'] ?></p>
                        </div>
                        
                        <div class="pf-content">
                            <a href="http://localhost/pages/u/<?php echo $_SESSION['youkai'] ?>/">Profile Git</a>
                            <a href="http://localhost/0/news/">Bildirimler/Haberler</a>
                            <a href="#">Sohbet</a>
                            <div>
                                <span style="margin-left: 12px;">Aktifliği değiştir</span>
                                <label class="switch kk">
                                    <?php
                                    require_once $_SERVER["DOCUMENT_ROOT"] . "/functions/config.php";
                                    $sth = $db->prepare("SELECT * FROM user_status WHERE youkai = :youkai");
                                    $sth->bindParam(':youkai', $_SESSION['youkai']);
                                    $sth->execute();
                                    $state = $sth->fetch(PDO::FETCH_ASSOC);
                                    if ($state['status'] == 1) {
                                        $_SESSION['status'] = 'checked';
                                    } else {
                                        $_SESSION['status'] = '';
                                    }
                                    //users_status tablosundaki değerin 1 ve 0 olmasına göre $status değişkenini değiştirme

                                    $sth = $db->prepare("SELECT * FROM user_status WHERE youkai = :youkai");
                                    $sth->bindParam(':youkai', $_SESSION['youkai']);
                                    $sth->execute();
                                    $state = $sth->fetch(PDO::FETCH_ASSOC);

                                    if($state['status'] == 1) {
                                        $status = " checked";
                                    } else {
                                        $status = "";
                                    }
                                    ?>
                                    <input id="online-activity" name="status" type="checkbox"<?php echo $status;?>>
                                    <span class="slider round"></span>
                                </label></p>
                            </div>
                        </div>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Çıkış Yap" class="cover-nav-link truncate-line" href="http://localhost/v2/logout/">
                            Çıkış Yap
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <form action="search" method="GET">
                            <input type="text" placeholder="Ara Beni Bul Beni" name="q">
                        </form>
                    </li>
                </ul>
            </nav>
            <script>
                // Checkbox elementini seç
                var toggleCheckbox = document.querySelector('#online-activity');

                // Checkbox durumu değiştiğinde tetiklenen olay işleyicisi
                toggleCheckbox.addEventListener('change', function() {
                var isChecked = this.checked; // Checkbox'ın yeni durumunu al
                if(isChecked==1)
                {
                    var status = '1';
                }
                else
                {
                    var status = '0';
                }
                // Ajax isteğini yap
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'functions/activity-status.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('status=' + status);
                });
            </script>
        </div>