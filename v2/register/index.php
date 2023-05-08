<?php
// Oturum başlatılır
session_start();

// Include config file
require_once $_SERVER["DOCUMENT_ROOT"] . "/functions/config.php";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // email geçerlilik kontrolü
    if(empty($_POST["email"]))
    {
        $email_err = "E-posta adresiniz doğrulama için gerekli.";
    }
    else
    {
        //mail değişkene atandı
        $email = trim($_POST["email"]);
        
        /* yukarıda  mail adresi veritabanında var mı diye sorgu yazıldı, sorgu çalıştırılmak üzere hazırlandı vs */
        $mail_stmt = $db->prepare("SELECT * FROM users WHERE user_email = :email");
        $mail_stmt->bindParam(":email", $email);
        $mail_stmt->execute();
        $chk_mail = $mail_stmt->fetch(PDO::FETCH_ASSOC);

        if($chk_mail)
        {
            $email_err = "Birisi bu e-posta ile çoktan kaydolmuş.";
        }
        else
        {
            $email = trim($_POST["email"]);
            $email_err = "";
        }
    }
 
    // youkai geçerlilik kontrolü
    if(empty(trim($_POST["youkai"])))
    {
        $youkai_err = "Kullanıcı adı lazım...";
    }
    
    elseif(!preg_match('/^[a-zA-Z0-9._]+$/', trim($_POST["youkai"])) < 6)
    {
        $password_err = "Kullanıcı adında büyük küçük harf nokta ve alt çizgi kullanma hakkı sana bahşedilendir.";
    }
    else
    {
        $youkai = trim($_POST["youkai"]);
        $youkai_chk_stmt = $db->prepare("SELECT * FROM users WHERE youkai = :youkai");
        $youkai_chk_stmt->bindParam(':youkai', $youkai);
        $youkai_chk_stmt->execute(); // Sorguyu çalıştır
        $user_chk = $youkai_chk_stmt->fetch(PDO::FETCH_ASSOC); // Kullanıcıyı al

        if($user_chk)
        {
            $youkai_err = "Şansına küs kullanıcı adı alınmış...";
        }
        else
        {
            $youkai = trim($_POST["youkai"]);
            $youkai_err = "";
        }
    }
    
    
    // password geçerlilik kontrolü
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Parolanı gir.";     
    }
    else if(strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Parolan 6 ve/ya daha uzun bir şey olmalı.";
    }
    else
    {
        $password = trim($_POST["password"]);
        $password_err = "";
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Parolanı doğrula";     
    }
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(!empty($password_err) || ($password != $confirm_password))
        {
            $confirm_password_err = "Parolalar eşleşmiyor. Gözlük falan lazım mı?";
        }
        else
        {
            $confirm_password_err = "";
        }
    }

    if(empty($email_err) && empty($youkai_err) && empty($password_err) && empty($confirm_password_err))
    {
        $youkai = trim($_POST['youkai']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user_reg_stmt = $db->prepare("INSERT INTO users (`user_email`, `youkai`, `password`, `users_url`) VALUES (:email, :youkai, :password, :user_url)");
        $user_reg = $user_reg_stmt->execute(
            array(
                ":email" => $email,
                ":youkai" => $youkai,
                ":password" => $hashed_password,
                ":user_url" => $youkai
            )
        );
                
        if($user_reg)
        {
            $user_about_stmt = $db->prepare("INSERT INTO `user_about` (`name`, `surname`, `name_changable`, `name_status`, `youkai`, `about`, `discord`, `link`, `social`) VALUES ('', '', '1', '0', :youkai, 'Bu kullanıcı anonim takılmayı seviyor.', 'Bu arkadaş discord kullanmıyor.', 'Yani evet. Herkes site sahibi olacak değil ya.', 'Cidden sosyal medya kullanmayan kaldı mı?')");
            $user_about_stmt->bindParam(':youkai', $youkai);
            $user_about_chk = $user_about_stmt->execute(); // Sorguyu çalıştır

            $user_about_stmt2 = $db->prepare("INSERT INTO `user_status` (`youkai`, `status`) VALUES (:youkai, '0')");
            $user_about_stmt2->bindParam(':youkai', $youkai);
            $user_about_chk1 = $user_about_stmt2->execute(); // Sorguyu çalıştır

            if($user_about_chk && $user_about_chk1)
            {
                include "../../functions/sendmail.php";
                include "../../functions/user-page-c.php";
                $_SESSION['loggedin'] = True;
                $_SESSION['youkai'] = $youkai;
                header('Location: http://localhost');
            }
            else
            {
                echo "Kötü oldu... Veri tabanında çok kritik bir yangın çıktı! Daha sonra tekrar dene...";
            }
        }
        else
        {
            echo "Sunucu isyan ediyor şu an kargaşa var gibi! Daha sonra tekrar dene...";
        }
    }

    // Close connection
    $db = NULL;
}

// Define variables and initialize with empty values
$youkai = $nameuser = $email = $surnameuser = $password = $confirm_password = "";
$youkai_err = $nameuser_err = $email_err = $surnameuser_err = $password_err = $confirm_password_err = "";
?>
 
<!DOCTYPE html>
<html lang="TR">
    <head>
        <meta charset="UTF-8">
        <title>Kayıt Formu</title>
        <link rel="stylesheet" href="../../assets/css/header.css">
        <link rel="stylesheet" href="../../assets/css/register.css">
        <link rel="stylesheet" href="../../assets/css/loading.css">
        <script src="../../assets/js/loading.js"></script>
    </head>
    <body>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/pages/registerpagehead.php";?>
        <center>
            <div class="section">
                <div class="wrapper-1">
                    <h1>Biliyor muydunuz?</h1>
                        <?php

                        $number = random_int(1,7);

                        if($number == 1)
                        {
                            echo "<p>(Perfect Memento'ya göre) Remilia sadece Sakuya'nın efendisi değil,<br> aynı zamanda Sakuya'ya adını veren kişidir.</p>";}

                        else if($number == 2)
                        {
                            echo "<p>Gensokyo zaman çizelgesine göre, Remilia 1502 yılında doğdu. Bu onu,<br> doğum tarihleri bilinen çok az karakterden birisi yapıyor.</p>";}

                        else if($number == 3)
                        {
                            echo "<p>Remilia Scarlet'in teması olan 'Septette for the Dead Princess', Ludwig van Beethoven'ın<br> Do minör Piyano Sonatı No.8, Op 13 'Pathetique' 3 Rondo: Allegro'ya dayanmaktadır.<br> <a href='https://www.youtube.com/watch?v=M_124D_7KoU&t=815s' target='_blank'>Buradan bakabilirsiniz.</a>";}

                        else if($number == 4)
                        {
                            echo "<p>Remilia Avrupalı bir görünüşe sahiptir. Romanyalı da olabilir ama bu sadece spekülasyon.</p>";}

                        else if($number == 5)
                        {
                            echo "<p>Flandre, Hopeless Masquerade'in arka planında görünmeyen birkaç karakterden<br> birisidir. Bu onun Kızıl Şeytan Malikânesi dışına çıkmayı sevmediğini gösteriyor.</p>";}

                        else if($number == 6)
                        {
                            echo "<p>Flandre'nin kanatlarının benzersiz olduğu söyleniyor. Herhangi bir youkai, hayalet,<br> yarasa ve benzer şeylerden farklı. Reimu bile Flandre'nin<br> o kanatlarla uçma yeteneğini sorguluyor...</p>";}

                        else if($number == 7)
                        {
                            echo "<p>Patchouli astımlı olarak doğmuştur.</p>";}

                        else
                        {
                            echo "<p>Kızıl Şeytan Malikâne kütüphanesindeki tüm kitapları onun yazdığı söyleniyor. Bu siteyi yapan kişiden daha hayatsız denebilir.</p>";}

                        ?>
                </div>
                <div class="wrapper-2">
                    <center>
                        <h2>Kayıt Formu</h2>
                        <p>Hesap oluşturmak bu formu doldur.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label>E-Posta Adresiniz</label>
                                <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                                class="form-control <?php echo (!empty($email_err)) ? "is-invalid" : ''; ?>"
                                placeholder="E-posta Adresiniz" value="<?php echo $email; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Kullanıcı Adınız</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="youkai" pattern="/^[a-zA-Z0-9._\]+$/"
                                class="form-control fix-rounded-right <?php echo (!empty($youkai_err)) ? 'is-invalid' : ''; ?>"
                                placeholder="Kullanıcı Adınızı Seçiniz" value="<?php echo $youkai; ?>" required>
                                <span class="invalid-feedback"><?php echo $youkai_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Parola</label>
                                <input type="password" name="password"
                                class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                placeholder="Şifrenizi Giriniz" value="<?php echo $password; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Parola Doğrulama</label>
                                <input type="password" name="confirm_password"
                                class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                placeholder="Şifrenizi Doğrulayınız" value="<?php echo $confirm_password; ?>">
                                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                            </div>

                            <label id="low" style="font-size:14px; margin:0;">
                                <div>Kayıt olursan <a href="http://localhost/pages/kayit-mi-oluyorsun-chen/" target="_blank">ilgli sayfadaki</a> tüm kuralları kabul etmiş sayılırsınız.</div>
                                <div>Vee evet, kabul etmek kullanabilmeniz için zorunludur.</div>
                            </label>
                            <div class="form-group">
                                <input type="reset" value="Formu Sıfırla">
                                <input type="submit" value="Kaydol">
                            </div>
                            <p>Zaten hesabın mı var? <a href="https://localhost/v2/login/">E- gelsene şuraya</a>.</p>
                        </form>
                    </center>
                </div>
            </div> 
        </center>
        <?php include("http://localhost/assets/pages/footer.php"); ?>
    </body>
</html>