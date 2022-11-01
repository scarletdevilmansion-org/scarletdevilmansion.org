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
                        <a title="Giriş Yap" class="cover-nav-link truncate-line" href="<?php echo 'http://localhost/functions/login/'; ?>">
                            Giriş Yap
                        </a>
                    </li>
                    <li class="cover-nav-option">
                        <a title="Kayıt Ol" class="cover-nav-link truncate-line" href="<?php echo 'http://localhost/functions/register/'; ?>">
                            Kayıt Ol
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </body>
</html>