<?php 

// Veritabanı bağlantısı için gerekli olan şey
require_once "../../../connections/connection.php";

 
// Değişkenler oluştulup boş değerler atanılır
$code_err = $username_err = "";
$code = $username = "";
 
// Form gönderildiğinde form verileri işlenir
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty($_POST['recovery_code']))
    {
        $code_err = "Kayıtlı e-mail adresinize gelen koda ihtiyacımız var.";
    }
    else
    {
        $result = mysqli_query($db,"SELECT * FROM user_verification WHERE username = '$username'");
        while ($info = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $code = $info["uvid"];
        }
        if($code == $_POST['recovery_code'])
        {
            $code_err = "Kodunuz doğru değil ya da kullanılmış";
        }
    }
    mysqli_close($db);

}
?>
 
<!DOCTYPE html>
<html>
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
                <label>Sıfırlama Kodun</label>
                <input type="code" name="username" placeholder="Sana gönderilen kodu yaz"
                class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $code; ?>">
                <span class="invalid-feedback"><?php echo $code_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Sıfırla">
            </div>
        </form>
    </div>    
</body>
</html>