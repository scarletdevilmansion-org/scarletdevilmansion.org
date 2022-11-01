<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <meta charset="UTF-8">
        <meta name="description" content="SDM Forum Sitesi">
        <meta name="author" content="Remilia Hakurei">
        <link rel="stylesheet" href="topic.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="cover-nav-wrapper">
            <nav class="cover-nav">
                <ul class="cover-nav-options tabs-scrollable">
                    <li class="cover-nav-option">
                        <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="#">
                            Forum Ana Sayfa
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="iletişim" class="cover-nav-link truncate-line" href="#">
                            iletişim
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Profil" class="cover-nav-link truncate-line" href="<?php echo 'http://localhost/pages/u/' .$_SESSION['username']. '/'; ?>">
                            Profil
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Çıkış Yap" class="cover-nav-link truncate-line" href="<?php echo 'http://localhost/functions/logout/'; ?>">
                            Çıkış Yap
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Yeni Konu" class="cover-nav-link truncate-line" href="<?php echo 'http://localhost/0/topic/new-topic/'; ?>">
                            Yeni Konu
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="topic-section">
            
            <div class="topic-content-section"> 
                         
            </div>
            <div class="topic-owner-section">
                
            </div>
            <div class="last-topic">

            </div>
        
        </div>

        
    </body>
</html>