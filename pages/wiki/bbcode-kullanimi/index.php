<?php

?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>BBCode Kullanımı | Scarlet Devil Mansion</title>
        <meta name="description" content="Site bbcode kullanım rehberi.">
        <meta name="keywords" content="Scarlet Devil Mansion forum bbcode kullanımı, bbcode kullanımı, Scarlet Devil Mansion">
        <meta name="author" content="Remilia Sc4rlet">
        <meta name="copyright" content="Scarlet Devil Mansion | 2022 - <?php echo date('Y');?>">
        <meta name="email" content="support@sdm-staff.org">
        <meta http-equiv="Content-Language" content="tr">
        <meta name="Charset" content="UTF-8">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/rehber.css">
        
        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <script src="http://localhost/assets/js/loading.js"></script>
    </head>
    <body>
        <div class="main">
            <center>
                <div class="cover-nav-wrapper">
                    <nav class="cover-nav">
                        <ul class="cover-nav-options tabs-scrollable">
                            <li class="cover-nav-option">
                                <a title="Ana Sayfa" class="cover-nav-link truncate-line"  id="active" href="http://localhost/">
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
                </div>
            </center>
            <div class="content">
                <div class="content-title">
                    <h1 id="bbcode-kullanımı">BBCode Kullanımı</h1>
                </div>
                <div class="content-body">
                    <p>BBCode, forum yazılımlarında kullanılan bir kodlama sistemidir. BBCode ile yazılarınızı renklendirebilir, yazılarınızı büyütebilir, yazılarınızı italik, kalın, altı çizili, üstü çizili, yatay çizgi, resim, video, link, kod vb. şekillerde düzenleyebilirsiniz.</p>
                    <p>Aşağıdaki tabloda sitede aktif ve düzgün olarak çalışabilen kodlar verilmiştir.</p>
                </div>
            </div>
            <div class="content-body-table">
                <table id="kod-tablosu">
                    <tr>
                        <th>BBCode</th>
                        <th>Açıklama</th>
                    </tr>
                    <tr>
                        <td>[b]Kalın[/b]</td>
                        <td><b>Kalın</b></td>
                    </tr>
                    <tr>
                        <td>[i]İtalik[/i]</td>
                        <td><i>İtalik</i></td>
                    </tr>
                    <tr>
                        <td>[u]Altı Çizili[/u]</td>
                        <td><u>Altı Çizili</u></td>
                    </tr>
                    <tr>
                        <td>[s]Üstü Çizili[/s]</td>
                        <td><s>Üstü Çizili</s></td>
                    </tr>
                    <tr>
                        <td>[hr]</td>
                        <td><hr></td>
                    </tr>
                    <tr>
                        <td>[img]http://localhost/assets/images/android-chrome-192x192.png[/img]</td>
                        <td><img src="http://localhost/assets/images/android-chrome-192x192.png" alt="Scarlet Devil Mansion"></td>
                    </tr>
                    <tr>
                        <td>[url]https://www.scarletdevilmansion.org[/url]</td>
                        <td><a href="https://www.scarletdevilmansion.org">https://www.scarletdevilmansion.org</a></td>
                    </tr>
                    <tr>
                        <td>[url=https://www.scarletdevilmansion.org]Scarlet Devil Mansion[/url]</td>
                        <td><a href="https://www.scarletdevilmansion.org">Scarlet Devil Mansion</a></td>
                    </tr>
                    <tr>
                        <td>[color=red]Kırmızı[/color]</td>
                        <td><span style="color: red;">Kırmızı</span></td>
                    </tr>
                    <tr>
                        <td>[url=http://localhost/assets/images/android-chrome-192x192.png][img]http://localhost/assets/images/android-chrome-192x192.png[/img][/url]</td>
                        <td><a href="http://localhost/assets/images/android-chrome-192x192.png"><img src="http://localhost/assets/images/android-chrome-192x192.png" alt="Scarlet Devil Mansion"></a></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center> Yakında daha fazla eklenmesi umudu ile...</center>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php include('../../assets/footer.php'); ?>
        <br><br>
    </body>
</html>