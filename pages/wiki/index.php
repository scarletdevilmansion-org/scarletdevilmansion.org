<?php

?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Wiki | Scarlet Devil Mansion</title>
        <meta name="description" content="Site wiki.">
        <meta name="keywords" content="Scarlet Devil Mansion Wiki, Scarlet Devil Mansion">
        <meta name="author" content="Remilia Sc4rlet">
        <meta name="copyright" content="Scarlet Devil Mansion - 2022">
        <meta name="email" content="support@sdm-staff.org">
        <meta http-equiv="Content-Language" content="tr">
        <meta name="Charset" content="UTF-8">
        <link rel="stylesheet" href="http://localhost/assets/css/header.css" />
        <link rel="stylesheet" href="http://localhost/assets/css/wiki.css" />

        <link rel="stylesheet" href="http://localhost/assets/css/loading.css">
        <style>
            /* The navigation bar */
            .navbar {
            overflow: hidden;
            background-color: #333;
            position: fixed; /* Set the navbar to fixed position */
            top: 0; /* Position the navbar at the top of the page */
            width: 100%; /* Full width */
            }

            .navbar li {
                list-style-type: none;
            }

            /* Links inside the navbar */
            .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }

            /* Change background on mouse-over */
            .navbar a:hover {
            background: #ddd;
            color: black;
            }
            #editor-kullanimi {
            display: block;
            }
            #bbcode-kullanimi, #gameplay, #controls, #spells, #danmaku, #fight, #th1, #th2, #th3 {
            display: none;
            }
        </style>
    </head>
    <body>
        <div class="main">
                <div class="cover-nav-wrapper">
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
                </div>
            <div class="content">
                    <div class="contents">
                        <li><h3>Forum</h3></li>
                        <ul>
                            <li><a href="#editor-kullanimi">Editör Kullanımı</a></li>
                            <li><a href="#bbcode-kullanimi">BBCode Kullanımı</a></li>
                        </ul>
                        <li><h3>Oyun Bilgisi</h3></li>
                        <ul>
                            <li><a href="#gameplay">Oynanış</a></li>
                            <li><a href="#controls">Kontroller</a></li>
                            <li><a href="#spells">Büyü Kartları (Spells)</a></li>
                        </ul>
                        <li><h3>Oyun Türleri</h3></li>
                        <ul>
                            <li> <a href="#danmaku">Danmaku</a></li>
                            <li><a href="#fight">Fight</a></li>
                        </ul>
                        <li><h3>Oyunlar</h3></li>
                        <ul>
                            <li><a href="#th1">Highly Responsive to Prayers</a></li>
                            <li><a href="#th2">Story of Eastern Wonderland</a></li>
                            <li> <a href="#th3">Phantasmagoria of Dim.Dream</a></li>
                            <li> <a href="#th4">Lotus Land Story</a></li>
                            <li><a href="#th5">Mystic Square</a></li>
                            <li><a href="#th6">Koumakyou / Embodiment of Scarlet Devil</a></li>
                        </ul>
                    </div>
                <div class="content-body" id="contenta">
                    <ul>
                        <div class="content-body-table" id="editor-kullanimi">
                            <h2>Editör Kullanımı</h2>
                            <p>Buradasın demek ki editör nasıl kullanılır bilmiyorsun.<sup>Biliyorsan ****** ***</sup></p>
                            <p>Çoğu editörde olan butonlarla biçimlendirme kullanmak yerine bbcode kullanarak sitemizdeki editörü kullanabilirsiniz. Nedeni ise tek başıma nasıl yapacağımı bulması çok zahmetli.</p>
                            <p>Bu editörü zamanım oldukça geliştirmeye çalışmaktayım siz orasına takılmayın elbet butonlu zamanıda gelecek.</p>
                            <span>Neyse devam edelim,</span>
                            <p>Şu aşağıdaki resmin olduğu yere konunuzun başlığını yazıyorsunuz.</p>
                            <img src="http://localhost/assets/images/wiki/83b71d940c05a6d6c3f0d775c99a06c6.png" alt="Editör">
                            <p>Konu başlığının altına da aynı şekilde içeriğinizi yazıyorsunuz.</p>
                            <img src="http://localhost/assets/images/wiki/34419201e7403eca9862cd7369e3b59c" alt="Doldurulmuş editör">
                            <p>Yukarıda görsüğünüz gibi hem konu başlığında hemde içeriğinde bbcode kullanabilirsiniz. Fakat başlıkta bbcode kullanırsanız sizi banlarım çünkü canım öyle istiyor.</p>
                            <p>Bu arada eğer yardım etmekle ilgileniyorsanız bana <a href="mailto:kyaleina@sdm-staff.org" style="text-decoration: none; color: yellow;">buradan</a> ulaşabilirsiniz.</p>
                        </div>
                        <div class="content-body-table" id="bbcode-kullanimi">
                            <table id="kod-tablosu">
                                <tr>
                                    <th><h2>BBCode</h2></th>
                                    <th><h2>Açıklama</h2></th>
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
                        <div class="content-body-table" id="gameplay">
                            <h2>Touhou Oyunlarının Oynanışı</h2>
                            <p>Touhou ( danmaku ) gelişme üzerinde dayalı bir oyun türüdür. Mantığı size küçüklü büyüklü sinir bozucu şeyler fırlatan karakterleri hikaye doğrultusunda <br>yenerek oyunu bitirmektir.</p>
                            <h3>Stage nedir?</h3>
                            <p>Stage oyunda engeller düşmanlar veya eşyalar içeren seviyelerdir ( bundan sonra burada bölüm olarak geçecektir ). Bir sonraki bölüme geçmek için bölüm sonu düşmanını yenerek 'Stage Clear' yazısını görmeniz gerekir.</p>
                            <p>Oyun genel olarak 6 bölümden oluşur. Her bölümde az önce belirttiğim gibi bir boss ( hikayedeki bölüm sonu karakteri ) bulunur. Bölümler arasında Mid-Boss bulunabilir. <br>Mid-boss örneği olarak Touhou Koumakyou'daki Cirno örnek verilebilir.</p>
                            <p>istisna olarak bazı oyunlardaki bölüm sayısı değişir, 'Highly Responsive to Prayers' 20 bölüme, 'Story of Eastern Wonderland' 5 bölüme ve <br>'Fairy Wars' 3 bölüme sahiptir gibi...</p>
                            <p>Oyunlarda Extra Stage diye bir kısımda vardır. Extra stage'i açmak için oyundaki belirli oyun şartlarını yerine getirmeniz gerekir, atıyorum Lunatic zorluk modunda hiç <br>bomba kullanmadan ve ölmeden bitir.</p>
                            <p>Extra Stageler'i açmak için oyunda kod da kullanabilirsiniz. Kodları kullanmak için oyunlarda çeşitli yerlerde belirli tuşlara basmanız ve kodu yazmanız gerekir. Örnek olarak <br>Touhou 7 Perfect Cherry Blossom ( PCB ) oyununda Shift ve Ctrl tuşlarını basılı tutarken 3 kez yukarı, 2 kez D, 2 kez aşağı ve 3 kez Q tuşuna basarsanız ekstra bölümü açabilirsiniz. <a href="https://en.touhouwiki.net/wiki/List_of_Unlock_Codes" style="color:yellow;text-decoration:none;">Buradan</a> ulaşabilirsiniz.</p>
                        </div>
                        <div class="content-body-table" id="controls">
                            <h2>Touhou Oyun Kontrolleri</h2>
                            <h3>Kontroller nelerdir? Menüdeyken nasıl seçim yapılır Karakter nasıl hareket eder?</h3>
                            <p>Oyundaki kontroller oldukça basittir.</p>
                            <ul>
                                <li>Klavye yön tuşları: üzerinde ok olan tuşlarla karakteri her yöne hareket ettirebilirsiniz.</li>
                                <li>Shift: basılı tutarsanız oynarken karakterin hızını azaltarak daha yavaş bir şekilde hareket etmenizi sağlar.</li>
                                <li>Z/Enter klavye tuşu: menüdeyken seçim onaylamak için kullanılır. Bölüm içerisindeyken karakterin tabir-i caize ateş etmesini sağlar. Düşman karakterleri yok <br>etmek ya da canını azaltmak için kullanabilirsiniz.</li>
                                <li>X klavye tuşu: menüdeyken geri gitmek ya da seçimleri iptal etmek için kullanılır. Bölüm içerisindeyken Spell Card adı verilen yeteneği kullanmanızı sağlar.</li>
                            </ul>
                            <p>Gördünüz mü oldukça basit.</p>
                        </div>
                        <div class="content-body-table" id="spells">
                            <h2>Touhou Spell Kartları</h2>
                            <p>Oynanabilir karakterlerin oyun içerisinde sınırlı sayıda sahip oldukları ve kullanabilecekleri yeteneklerdir.</p>
                        </div>
                        <div class="content-body-table" id="danmaku">
                            <h3>Touhou Danmaku Oyun türü</h3>
                            <p>Touhou'nun çıkan ilk oynudur. PC98 ile çalışır.</p>
                        </div>
                        <div class="content-body-table" id="fight">
                            <h3>Touhou Dovüş Oyun Türü</h3>
                            <p>Touhou'nun çıkan ilk oynudur. PC98 ile çalışır.</p>
                        </div>
                        <div class="content-body-table" id="th1">
                            <h3>Touhou 1: Highly Responsive to Prayers</h3>
                            <p>Touhou'nun çıkan ilk oynudur. PC98 ile çalışır.</p>
                        </div>
                        <div class="content-body-table" id="th2">
                            <h3>Touhou 2: Story of Eastern Wonderland</h3>
                            <p>Touhou'nun çıkan ikinci oynudur. PC98 ile çalışır.</p>
                        </div>
                    </ul>
                </div>
            </div>
            <script>
            const links = document.querySelectorAll('.contents ul li a');
            const content = document.querySelector('#contenta');

            links.forEach(link => {
                link.addEventListener('click', event => {
                    event.preventDefault();
                    const clickedId = link.getAttribute('href').substring(1);
                    const divs = content.querySelectorAll('div');

                    divs.forEach(div => {
                    if (div.id === clickedId) {
                        div.style.display = 'block';
                    } else {
                        div.style.display = 'none';
                    }
                    });
                });
            });
            </script>

        </div>
        <?php include('../../assets/footer.php'); ?>
        <br><br>
    </body>
</html>
<!-- <div class="content-title">
                    <h1 id="site-editoru">Site Editör Kullanımı</h1>
                </div>
                <div class="content-body">
                    <p>Site editörü hala geliştirme aşamasındadır. Kullanma mantığı çoğu forumdaki mantıkla aynıdır.</p>
                </div>
            </div>
            <div class="content-body-table">
                <p>Başlık kısmına konunuzun başlığını yazarsınız. içerik kısmına ise konunuzla ilgili içeriği yazarsınız.</p>
            </div> -->