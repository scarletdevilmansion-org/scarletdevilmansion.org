<?php
// Initialize the session
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/functions/config.php";

// Define variables and initialize with empty values
$youkai = $password = "";
$youkai_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if youkai is empty
    if(empty(trim($_POST["youkai"]))){
        $youkai_err = "Bu lazım hani giriş işleri için. Anlarsın ya?..";
    } else{
        $youkai = trim($_POST["youkai"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Şifrenizi girmeyi düşünür müsünüz?";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($youkai_err) && empty($password_err))
    {

        $stmt = $db->prepare("SELECT * FROM users WHERE youkai = :youkai");
        $stmt->bindParam(':youkai', $youkai);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($user)
        {
            // User exists, check the password
            if(password_verify($password, $user['password']))
            {
                // Passwords match, log the user in
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['youkai'] = $user['youkai'];
                $_SESSION["loggedin"] = True;

                if(!empty($_POST["checkbox"]))
                {
                    setcookie("youkai", $youkai, time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie("password",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
                }

                header("location: http://localhost");
            }
            else
            {
                // Passwords don't match
                $password_err = "Hop? Hesap çalmaya çalışmıyon de mi knk?";
            }
        }
        else
        {
            // User doesn't exist
            $youkai_err = "Kullanıcı adın doğru değil mi? Eminsin yani?";
        }
    }
    else
    {
    $login_err = "Sunucuda iç savaş çıktı! Anlayışın için çok tşk.";
    }
    
    // Close connection
    $db = NULL;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../../assets/css/login.css">
    <link rel="stylesheet" href="../../assets/css/loading.css">
    <script src="../../assets/js/loading.js"></script>
</head>
    <body>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/pages/loginpagehead.php";?>
        <center>
            <div class="section">
                <div class="wrapper-2">
                    
                    <h2>Giriş Yapınız</h2>
                    <p>Giriş yapmak için boş yerleri doldur.</p>
                    <?php 
                        if(!empty($login_err)){
                            echo '<span class="invalid-feedback">' . $login_err . '</span>';
                        }        
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" name="youkai" class="form-control <?php echo (!empty($youkai_err)) ? 'is-invalid' : ''; ?>"
                            placeholder="O eşsiz kullanıcı adını yaz." value="<?php echo $youkai; ?>">
                            <span class="invalid-feedback"><?php echo $youkai_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Parola</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                            placeholder="Sır gibi sakladığın şifren buraya.">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox">
                            <label class="form-check-label" for="checkbox">Beni Unuğtma</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Giriş Yap">
                        </div>
                        <p>Hesap mı lazım? <a href="../register/">Hop Şuraya alalım seni</a>.</p>
                    </form>
                </div>
                <div class="wrapper-1">
                    <h2>Biliyor muydunuz?</h2>
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
            </div>
        </center>
        <?php include "http://localhost/assets/pages/footer.php"; ?>
    </body>
</html>