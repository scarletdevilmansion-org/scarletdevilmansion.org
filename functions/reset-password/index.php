<?php 

// Veritabanı bağlantısı için gerekli olan şey
require_once "../../connections/connection.php";
 
// Değişkenler oluştulup boş değerler atanılır
$new_password = $confirm_password = $code_recovery_err = $username_err = "";
$new_password_err = $confirm_password_err = $code_recovery = $username = "";
 
// Form gönderildiğinde form verileri işlenir
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['username']))
    {
        $username_err = "Kullanıcı adınıza ihtiyacımız var.";
    }
    else
    {
        $username = trim($_POST['username']);
    }

    if(empty($_POST['new_password']))
    {
        $new_password_err = "Yeni bir parola belirle.";
    }
    else
    {
        $new_password = trim($_POST['new_password']);
    }

    if(empty($_POST['confirm_password']))
    {
        $confirm_password_err = "Parolanı tekrar gir.";
    }
    else
    {
        if($_POST['confirm_password'] != $new_password)
        {
            $confirm_password_err = "Parolalar uyuşmuyor.";
        }
        else
        {
            $confirm_password = trim($_POST['confirm_password']);
        }
    }

    if(empty($_POST['recovery_code']))
    {
        $code_recovery_err = "Kurtarma kodun gerekli.";
    }
    else
    {
        $code_recovery = $_POST['recovery_code'];
    }
    
    if(empty($username_err) && empty($code_recovery_err) && empty($new_password_err) && empty($confirm_password_err))
    {
        $sql = "SELECT * FROM user_verification WHERE uvid = '$code_recovery' AND username = '$username'";

        if(mysqli_stmt_execute(mysqli_prepare($db, $sql))){

            $sql2 = "UPDATE users SET password = ? WHERE username = '$username'";

            if($stmt = mysqli_prepare($db, $sql2)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_password);

                $param_password = password_hash($new_password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_password);

                    $param_password = password_hash($new_password, PASSWORD_DEFAULT); // Creates a password hash

                    $sql3 = "UPDATE user_verification SET uvid = NULL WHERE username = '$username'";
                    mysqli_stmt_execute(mysqli_prepare($db, $sql3));

                    header("location: http://localhost/functions/login");
                }
            }

            mysqli_stmt_close($stmt);
        }
        else
        {
            $code_recovery_err = "Kod Hatalı.";
        }
    }
    mysqli_close($db);
}
?>
 
<!DOCTYPE html>
<html lang="TR">
<head>
    <meta charset="UTF-8">
    <title>Şifre Sıfırlama</title>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px Comic Sans MS; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Şifre Sıfırlama</h2>
        <p>Şifrenizi sıfırlamak için lütfen bu formu doldurun.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Kullanıcı Adın</label>
                <input type="code" name="username" placeholder="kullanıcıAadını Yaz"
                class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Parola sıfırlama kodun</label>
                <input type="code" name="recovery_code" placeholder="Parola Sıfırlama Kodunu Yaz"
                class="form-control <?php echo (!empty($code_recovery_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $code_recovery; ?>">
                <span class="invalid-feedback"><?php echo $code_recovery_err; ?></span>
            </div>
            <div class="form-group">
                <label>Yeni Parola</label>
                <input type="password" name="new_password" placeholder="Yeni Parola Buraya"
                class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Parolayı Onaylayınız</label>
                <input type="password" name="confirm_password" placeholder="Yeni Parola TeKRaR Buraya"
                class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Sıfırla">
                <a class="btn btn-link ml-2" href="http://localhost/">Vazgeçtim :d</a>
            </div>
        </form>
    </div>    
</body>
</html>