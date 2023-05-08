<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header('Location: http://localhost');
    exit;
}
else
{
echo
'       <div class="cover-nav-wrapper">
            <nav class="cover-nav">
                <ul class="cover-nav-options tabs-scrollable">
                    <li class="cover-nav-option">
                        <a title="Ana Sayfa" class="cover-nav-link truncate-line" href="http://localhost/">
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
                    <li class="cover-nav-option">
                        <form action="http://localhost/search/" method="GET">
                            <input type="text" placeholder="Ara Beni Bul Beni" name="q">
                        </form>
                    </li>
                </ul>
            </nav>
        </div>';
}