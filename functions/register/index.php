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
    if(empty($_POST["surnameuser"])){
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

                    include('user-page-c.php');
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
        $sql = "INSERT INTO users (`isim`, `soy_isim`, `user_email`, `username`, `password`) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_surname, $param_email, $param_username, $param_password);
            
            // Set parameters
            $param_name = $nameuser;
            $param_surname = $surnameuser;
            $param_username = $username;
            $param_email = $email;

            //$param_password = $password; // Creates a password hash
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                $user_about_sql = "INSERT INTO `user_about` (`table_id`, `user_id`, `about`, `discord`, `link`, `social`) VALUES (NULL, '$username', 'Bu kullanıcı anonim takılmayı seviyor.', 'Bu arkadaş discord kullanmıyor.', 'Yani evet. Herkes site sahibi olacak değil ya.', 'Cidden sosyal medya kullanmayan kaldı mı?')";
                mysqli_stmt_execute(mysqli_prepare($db, $user_about_sql));

                //check the mail sender
                //require "uvid-check.php";
                

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
</head>
<body>
    <center>
        <div class="section">
            <div class="wrapper-1">
                <h1>Başlık H1</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum animi fugit,<br>
                vitae voluptate possimus placeat vero ullam reiciendis odit ipsam necessitatibus eaque.<br>
                Dolor placeat facilis, impedit eos esse minus. Dolore? 1425x881,812 - 641,438x633,812</p>
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