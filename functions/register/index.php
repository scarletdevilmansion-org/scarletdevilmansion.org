<?php
// Oturum başlatılır
session_start();

// Include config file
require_once "../../connections/connection.php";

if(!empty($_SESSION['username'])){
    header("location: http://localhost/");
    exit;
}
 
// Define variables and initialize with empty values
$username = $nameuser = $email = $surnameuser = $password = $confirm_password = "";
$username_err = $nameuser_err = $email_err = $surnameuser_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    if(empty($_POST["nameuser"])){
        $nameuser_err = "Adınızı giriniz.";     
    } else{
        $nameuser = $_POST["nameuser"];
    }

    // soy isim kontrolü
    if(empty($_POST["surnameuser"]))
    {
        $surnameuser_err = "Soy adınızı giriniz.";     
    } else{
        $surnameuser = $_POST["surnameuser"];
    }

    // email geçerlilik kontrolü
    if(empty($_POST["email"])){

        $email_err = "E-posta adresiniz doğrulama için gerekli.";   

    } else {

        $check_mail = $_POST["email"]; //mail değişkene atandı
        /**
         * $email_check_sql = "SELECT user_email FROM users WHERE user_email = '$check_mail'";
         * $email_validate_check = mysqli_query($db, $email_check_sql);
         * if(mysqli_num_rows($email_validate_check)){}else{}
         * 
         * @see MAIL::!=
         * 
         * */
        $email_validate_check = mysqli_query($db, "SELECT user_email FROM users WHERE user_email = '$check_mail' AND username != NULL");
        /* yukarıda  mail adresi veritabanında var mı diye sorgu yazıldı, sorgu çalıştırılmak üzere hazırlandı vs */

        if(mysqli_num_rows(mysqli_query($db, "SELECT user_email FROM users WHERE user_email = '$check_mail'")) > 0 )
        // yukarıda veritabanında e-mail var mı kontrolü yapılıyor
        {

            $email_err = "Başka bir e-posta adresi seçmen lazım. Bununla zaten kayıt olunmuş...";
            // varsa hata mesajı   

        } else{

            $email = $_POST["email"];
            // yoksa hata olmayan mesajı

        }
    }

    // veritabanına eklemeden önce giriş hataları kontrol edilir
    /* if(empty($nameuser_err) || empty($surnameuser_err)){
        
        // Kayıt sorgusu hazırlanır
        $sql = "INSERT INTO `users` (`isim`, `soy_isim`) VALUES (?, ?)";
        
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $nameuser, $surnameuser);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                echo "Hata yok.";
            } else{
                echo "Bir şeyler ters gitti. Daha sonra tekrar dene/ya da şimdi sana kalmış.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    } */
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Kullanıcı adı lazım...";
    } elseif(!preg_match('/^[a-zA-Z0-9._]+$/', trim($_POST["username"]))){
        $username_err = "Kullanıcı adı yalnızca harf, sayı, nokta ve alt çizgi içerebilir.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Aaaah işe bak... Biri bunu çoktan almış.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "AHa! Sunucu isyan ediyor şu an kargaşa var gibi! Daha sonra tekrar dene...";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Parolanı gir.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Parolan 6 ve/ya daha uzun bir şey olmalı.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Parolanı doğrula";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Parolalar eşleşmiyor. Gözlük falan lazım mı?";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($nameuser_err) && empty($surnameuser_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)){

        /*include('vuid-register.php');*/
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (`isim`, `soy_isim`, `user_email`, `username`, `password`, `users_url`) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_surname, $param_email, $param_username, $param_password, $param_users_url);
            
            // Set parameters
            $param_name = $nameuser;
            $param_surname = $surnameuser;
            $param_username = $username;
            $param_email = $email;
            $param_users_url = $username;

            //$param_password = $password; // Creates a password hash
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            include('user-page-c.php');

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                $user_about_sql = "INSERT INTO `user_about` (`table_id`, `user_id`, `about`, `discord`, `link`, `social`) VALUES (NULL, '$username', 'Bu kullanıcı anonim takılmayı seviyor.', 'Bu arkadaş discord kullanmıyor.', 'Yani evet. Herkes site sahibi olacak değil ya.', 'Cidden sosyal medya kullanmayan kaldı mı?')";
                mysqli_stmt_execute(mysqli_prepare($db, $user_about_sql));

                //Check if username exists
                $user_verify_code = "INSERT INTO user_verification (`uvid`, `username`) VALUES (NULL, '$username')";
                mysqli_stmt_execute(mysqli_prepare($db, $user_verify_code));

                //check the mail sender
                require "uvidcheck.php";

                // Redirect to login page
                header("location: http://localhost/functions/login");
            } else{
                echo "Bir şeyler ters gitti. Daha sonra tekrar dene/ya da şimdi sana kalmış.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($db);
}
?>
 
<!DOCTYPE html>
<html lang="TR">
    <head>
        <meta charset="UTF-8">
        <title>Kayıt Formu</title>
        <link rel="stylesheet" href="../../assets/css/register.css">
        <link rel="stylesheet" href="../../assets/css/loading.css">
        <script src="../../assets/js/loading.js"></script>
    </head>
    <body>
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
                            echo "<p>16. Remilia Avrupalı bir görünüşe sahiptir. Romanyalı da olabilir ama bu sadece spekülasyon.</p>";}

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
                                <label>Adınız</label>
                                <input type="text" name="nameuser"
                                class="form-control <?php echo (!empty($nameuser_err)) ? 'is-invalid' : ''; ?>"
                                placeholder="Adınız" value="<?php echo $nameuser; ?>">
                                <span class="invalid-feedback"><?php echo $nameuser_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Adınız</label>
                                <input type="text" name="surnameuser"
                                class="form-control <?php echo (!empty($surnameuser_err)) ? 'is-invalid' : ''; ?>"
                                placeholder="Soy Adınız" value="<?php echo $surnameuser; ?>">
                                <span class="invalid-feedback"><?php echo $surnameuser_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>E-Posta Adresiniz</label>
                                <input type="email" name="email"
                                class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                                placeholder="E-posta Adresiniz" value="<?php echo $email; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Kullanıcı Adınız</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username"
                                class="form-control fix-rounded-right <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                placeholder="Kullanıcı Adınızı Seçiniz" value="<?php echo $username; ?>" required>
                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
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
                            <p>Zaten hesabın mı var? <a href="https://localhost/functions/login/">E- gelsene şuraya</a>.</p>
                        </form>
                    </center>
                </div>
            </div> 
        </center>
    </body>
</html>