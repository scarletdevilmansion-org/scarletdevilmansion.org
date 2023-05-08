<?php
echo
'<center>
    <div class="cover-nav-wrapper">
        <nav class="cover-nav">
            <ul class="cover-nav-options tabs-scrollable">
                <li class="cover-nav-option">
                    <a title="Ana Sayfa" class="cover-nav-link truncate-line" href="http://localhost/">
                        Ana Sayfa
                    </a>
                </li>
                <li class="cover-nav-option">
                    <a title="Oyunlar" class="cover-nav-link truncate-line" href="http://localhost/#">
                        Oyunlar
                    </a>
                </li>
                <li class="cover-nav-option">
                    <a title="Müzikler" class="cover-nav-link truncate-line" href="http://localhost/#">
                        Müzikler
                    </a>
                </li>
                <li class="cover-nav-option">
                    <a title="Geri Dön" class="cover-nav-link truncate-line" style="text-decoration: none; color: #fff;" href="http://localhost/pages/u/'; echo $_SESSION["youkai"] . '">
                        Profil
                    </a>
                </li>
                <li class="cover-nav-option">
                    <a title="Çıkış Yap" class="cover-nav-link truncate-line" href="http://localhost/v2/logout/">
                        Çıkış Yap
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
</center>';
?>