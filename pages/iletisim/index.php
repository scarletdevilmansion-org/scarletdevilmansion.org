<?php

require_once "../../connections/dataconnect.php";

$konu = $isim = $email = $mesaj = "";
    
        
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    if($_POST['subject'] =="usersets")
    {
        $konu = "Kullanıcı işlemleri";
    }

    if($_POST['subject'] == "job")
    {
        $konu = "İş ilanı";
    }

    if($_POST['subject'] == "support")
    {
        $konu = "Diğer";
    }

    if($_POST['subject'] == "advertising")
    {
        $konu = "Reklam";
    }

    if($_POST['subject'] == "other")
    {
        $konu = "Diğer";
    }

    $isim = $_POST['name'];
    $email = $_POST['email'];
    $mesaj = $_POST['message'];
    $db->query("SET CHARACTER SET UTF8");
    $db->query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");

    $sql = "INSERT INTO contact (`subject`, `name`, `email`, `message`) VALUES (?, ?, ?, ?)";

    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $param_konu, $param_isim, $param_email, $param_mesaj);
        
        // Set parameters
        $param_konu = $konu;
        $param_isim = $isim;
        $param_email = $email;
        $param_mesaj = $mesaj;

        // Attempt to execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Close statement
        mysqli_stmt_close($stmt);
    }
    $db->close();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Posta Kutusu | Scarlet Devil Mansion</title>
        <meta name="description" content="iletişim sayfası.">
        <meta name="keywords" content="Touhou, Touhou Project, Touhou Projesi">
        <meta name="author" content="Kyaleina Dewalona">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/contact.css">
        <link rel="icon" type="image/x-icon" href="../../favicon.ico">
        <meta charset="UTF-8">
    </head>
    <body>
        <center>
            <div class="form-control">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <select name="subject" required>
                        <option value="usersets">Kullanıcı işleri</option>
                        <option value="job">iş olanakları (gönüllü)</option>
                        <option value="support">Site Destek</option>
                        <option value="advertising">Reklam</option>
                    </select>
                    <input type="text" name="name" placeholder="İsim" required>
                    <input type="email" name="email" placeholder="E-posta" required>
                    <textarea name="message" placeholder="Mesaj" required></textarea>
                    <input type="submit" name="submit" value="Gönder">
                </form>
            </div>
        </center>
    </body>
</html>