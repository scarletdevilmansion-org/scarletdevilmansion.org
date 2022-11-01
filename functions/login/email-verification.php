<?php

require_once '../../../connections/databaseconnect.php';

include 'PHPMailer/class.phpmailer.php';
include 'PHPMailer/class.smtp.php';
include 'PHPMailer/PHPMailerAutoload.php';

//Set variables
$username = $_SESSION['username'];

$bytes = random_bytes(8);
var_dump(bin2hex($bytes));

$sql="INSERT INTO `user_verification` (`user_id`, `uvid`) VALUES ('$username', '$bytes')";

if (!mysqli_query($db,$sql)) {
die('Hata: ' . mysqli_error($con));
}

//Mailler

$mail = new PHPMailer();

$mail->CharSet = "UTF-8";

//Türkçe dil ayarı
$mail->setLanguage('tr', 'PHPMailer/language/');


//$mail->SMTPDebug = 3;                                  // Enable verbose debug output

$mail->isSMTP();                                         // Set mailer to use SMTP
$mail->Host = 'mail.scarletdevilmansion.org';            // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                  // Enable SMTP authentication
$mail->Username = 'no-reply@scarletdevilmansion.org';    // SMTP username
$mail->Password = 'bbt50c!#@7p00ZX';                     // SMTP password
$mail->SMTPSecure = 'ssl';                               // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                       // TCP port to connect to

$mail->setFrom('no-reply@scarletdevilmansion.org', 'SDM Destek');  //Sender Mail
$mail->addAddress($yenieposta, $adi);                    // Add a recipient



  //Content
    $mail->isHTML(true);                                 //Set email format to HTML
    $mail->Subject = 'Doğrulama';
    $mail->Body    = '
    Doğrulanmak için <a href="https://scarletdevilmansion.org/functions/verification/?username=' . $username . '&uvid=' . $bytes . '&eposta=' . $email'">buraya</a> tıkla.
    ';
    $mail->AltBody = 'SDM Destek Ekibi - oysa sadece 1 kişi...';
    
    if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    }


##################
#                #
#     Mailer     #
#                #
##################

?>