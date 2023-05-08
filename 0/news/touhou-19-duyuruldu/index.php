<?php

?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Touhou 19 Duyuruldu! | Scarlet Devil Mansion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.scarletdevilmansion.org/assets/css/news-content.css">
        <link rel="stylesheet" href="https://www.scarletdevilmansion.org/assets/css/header.css">
        <link rel="icon" type="image/x-icon" href="https://www.scarletdevilmansion.org/favicon.ico">
    </head>
    <body>
        <?php
            require_once $_SERVER["DOCUMENT_ROOT"] . "/functions/config.php";

            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                include('https://www.scarletdevilmansion.org/assets/pages/logout-header.php');
            } else {
                include('https://www.scarletdevilmansion.org/assets/pages/login-header.php');
            }
            
            $db = NULL;
        ?>
        <section>
            <div class="news-main">
                <h1>Touhou Projesi Serisi 19</h1>
                <h3>ZUN'un ağzıyla,</h3>
                <center>
                    <p>Merhaba, ben ZUN</p>
                    <p>Yeni yılın başından bu yana geliştirme odasında sıkışıp <br>kalmışım ve farkında olmadan yaz mevsimi gelmiş, şaşkınlık içerisindeyim.</p>
                    <p>Bu sefer, Touhou Project'in yeni çalışması, 19. bölümünün tanıtımıdır.</p>
                </center>
                <center>
                    <img src="https://www.scarletdevilmansion.org/0/news/src/imgs/th19_news_header.png" alt="Touhou 19 Menü">
                    <span>東方Project第19弾</span><br>
                    <span>東方獣王園 〜 Unfinished Dream of All Living Ghost.</span><br>
                </center>
                <center>
                    <p>〜 Hikaye 〜</p>
                    <p>
                        Pazarın açılmasıyla, eski toprakların mülkiyeti yok oldu.
                        Mülk sahipleri kaybedilen topraklar bozulacak.
                    </p>
                    <p>
                        Ancak, endişelenmenize gerek yok.
                    </p>
                    <p>
                        Doğal olarak ruhlar ve doğa topraklara yerleşecek ve her zamanki sıkıntıları geri getirecektir.
                    </p>
                    <p>&nbsp;</p>
                    <p>Ancak, açgözlü hayvanlar orada olmasaydı her şey iyi olabilirdi...</p>
                </center>
                <p>&nbsp;</p>
                <center>
                    <p>Bu sefer nadir rastlanan bir karşılıklı atış tarzı oyunla karşınızdayız.</p>
                    
                    <p>Touhou Project'in 9. bölümü "Touhou Kaeidzuka" ekran düzenine uygun olsa da, <br>oyunun hissiyatını ve atış yoğunluğunu geleneksel Touhou'ya daha yakın hale getirmek için sistem yeniden yapılandırıldı.</p>

                    <p>Hızlı bir karşılaşma oyununda sürekli olarak ad libitum kaçınma yolu zorlanıyor, <br>basitçe söylemek gerekirse, Touhou gücü yüksek olanların avantajlı olduğu bir oyuna dönüşüyor.</p>

                    <p>Geniş bir hikaye modu, biraz farklı bir sistemle tek kişilik oynanabilen bir karşılaşma modundan ayrı <br>olarak hazırlandı, bu nedenle arkadaşlarınız yoksa bile endişelenmenize gerek yok.</p>
                    <p>(Bu arada hikaye modunda da Touhou gücünüz sınanacaktır.)</p>

                    <p>Karanlık ve enerjik, biraz sevimli yaratıkların delice şöleninin keyfini çıkarın.</p>

                    <p>Aşağıda ekran görüntüsü bulunmaktadır.</p>
                </center>
                <center>
                    <img src="th19_02.png" alt="">
                    <img src="th19_03.png" alt="">
                    <img src="th19_04.png" alt="">
                    <img src="th19_05.png" alt="">
                    <img src="th19_06.png" alt="">
                    <img src="th19_07.png" alt="">
                    <img src="th19_08.png" alt="">
                    <span>Görüntüler oyun geliştirme aşamasında olduğu için hemen değişebilir.</span><br>
                </center>
                <center>
                    <p>Satışlar yazın yapılacak olan Comic Market'te (夏コミ) olması planlanmaktadır. Demo versiyonu 7 Mayıs'ta (PAzar Günü) Hakurei Shrine Festivalinde Big Sight'ta dağıtılacaktır.</p>
                    
                    <p>Demo versiyonu 7 Mayıs'ta (Güneş) Hakurei Shrine Festivalinde Big Sight'ta dağıtılacaktır.<br>(Satış Yeri: A01ab Shanghai Alice Phantom Band)</p>
                    
                    <p>Ayrıca oyun steam üzerinden de indirlebilecektir.</p>
                    Demo sürümü beş karakterin kullanımına izin veriyor: Reimu Hakurei, Marisa Kirisame, Aun Koraino, Nazurin ve Seiran.
                    <p>Demo sürümü beş karakterin kullanımına izin veriyor: "Hakurei Reimu", "Kirisame Marisa", "Koishi Komeiji", "Nazrin", ve "Kyouko Kasodani".</p>

                    <p>Not: Karakter kısıtlamaları nedeniyle, demo sürümünün hikayesi tam sürümden farklıdır.</p>
                    <p>Görüşmek üzere.</p>
                </center>
            </div>
        </section>
<?php include("https://www.scarletdevilmansion.org/assets/pages/footer.php"); ?>

</html>
    