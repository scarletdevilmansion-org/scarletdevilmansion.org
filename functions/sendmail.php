<?php

// Include config file
require_once $_SERVER["DOCUMENT_ROOT"] . "/functions/config.php";

//Email verification code file
require "uvid-func.php";

//Set uvid
$uvid = get_rand_alphanumeric(8);

//Check if username exists
$user_verify_code = $db->prepare("UPDATE user_verification SET uvid = :uvid WHERE username = :username");
$user_verify_code->bindParam(':username', $username);
$user_verify_code->bindParam(':uvid', $uvid);
$user_verify_code->execute(); // Sorguyu çalıştır

#-----------------------------------------------------------------------------------------------------------------------------------------------------------

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->CharSet = "UTF-8";

//Türkçe dil ayarı
$mail->setLanguage('tr', 'PHPMailer/language/');                         // Set mailer language

include("mail-config.php");                                                 // Mail Config (Username, Password

$mail->addAddress($email, $username);                                           // Add a recipient

  //Content
    $mail->isHTML(true);                                                    //Set email format to HTML
    $mail->Subject = 'Doğrulama';
    $mail->Body    = 
    '
    <!doctype html>
    <html>
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Scarlet Devil Mansion Doğrulama</title>
        <style>
          /* -------------------------------------
              GLOBAL RESETS
          ------------------------------------- */
          
          /*All the styling goes here*/
          
          img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; 
          }

          body {
            background-color: #a6a6a6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            margin-top: 50px;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; 
          }

          table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
            table td {
              font-family: sans-serif;
              font-size: 14px;
              vertical-align: top; 
          }

          p {
            color: #dbdbdb;
          }

          /* -------------------------------------
              BODY & CONTAINER
          ------------------------------------- */

          .body {
            background-color: #a6a6a6;
            width: 100%; 
          }

          /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
          .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px; 
          }

          /* This should also be a block element, so that it will fill 100% of the .container */
          .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px; 
          }

          /* -------------------------------------
              HEADER, FOOTER, MAIN
          ------------------------------------- */
          .main {
            background: #747474;
            border-radius: 3px;
            width: 100%; 
          }

          .wrapper {
            box-sizing: border-box;
            padding: 20px; 
          }

          .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
          }

          .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%; 
          }
            .footer td,
            .footer p,
            .footer span,
            .footer a {
              color: #fff;
              font-size: 12px;
              text-align: center; 
          }

          /* -------------------------------------
              TYPOGRAPHY
          ------------------------------------- */
          h1,
          h2,
          h3,
          h4 {
            color: #fff;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px; 
          }

          h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; 
          }

          p,
          ul,
          ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px; 
          }
            p li,
            ul li,
            ol li {
              list-style-position: inside;
              margin-left: 5px; 
          }

          a {
            color: #3498db;
            text-decoration: underline; 
          }

          /* -------------------------------------
              BUTTONS
          ------------------------------------- */
          .btn {
            box-sizing: border-box;
            width: 100%; }
            .btn > tbody > tr > td {
              padding-bottom: 15px; }
            .btn table {
              width: auto; 
          }
            .btn table td {
              background-color: #dfdfdf;
              border-radius: 5px;
              text-align: center; 
          }
            .btn a {
              background-color: #dfdfdf;
              border: solid 1px #3498db;
              border-radius: 5px;
              box-sizing: border-box;
              color: #3498db;
              cursor: pointer;
              display: inline-block;
              font-size: 14px;
              font-weight: bold;
              margin: 0;
              padding: 12px 25px;
              text-decoration: none;
              text-transform: capitalize; 
          }

          .btn-primary table td {
            background-color: #8d4a84; 
          }

          .btn-primary a {
            background-color: #8d4a84;
            border-color: #8d4a84;
            color: #dfdfdf; 
          }

          /* -------------------------------------
              OTHER STYLES THAT MIGHT BE USEFUL
          ------------------------------------- */
          .last {
            margin-bottom: 0; 
          }

          .first {
            margin-top: 0; 
          }

          .align-center {
            text-align: center; 
          }

          .align-right {
            text-align: right; 
          }

          .align-left {
            text-align: left; 
          }

          .clear {
            clear: both; 
          }

          .mt0 {
            margin-top: 0; 
          }

          .mb0 {
            margin-bottom: 0; 
          }

          .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; 
          }

          .powered-by a {
            text-decoration: none; 
          }

          hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0; 
          }

          /* -------------------------------------
              RESPONSIVE AND MOBILE FRIENDLY STYLES
          ------------------------------------- */
          @media only screen and (max-width: 620px) {
            table.body h1 {
              font-size: 28px !important;
              margin-bottom: 10px !important; 
            }
            table.body p,
            table.body ul,
            table.body ol,
            table.body td,
            table.body span,
            table.body a {
              font-size: 16px !important; 
            }
            table.body .wrapper,
            table.body .article {
              padding: 10px !important; 
            }
            table.body .content {
              padding: 0 !important; 
            }
            table.body .container {
              padding: 0 !important;
              width: 100% !important; 
            }
            table.body .main {
              border-left-width: 0 !important;
              border-radius: 0 !important;
              border-right-width: 0 !important; 
            }
            table.body .btn table {
              width: 100% !important; 
            }
            table.body .btn a {
              width: 100% !important; 
            }
            table.body .img-responsive {
              height: auto !important;
              max-width: 100% !important;
              width: auto !important; 
            }
          }

          /* -------------------------------------
              PRESERVE THESE STYLES IN THE HEAD
          ------------------------------------- */
          @media all {
            .ExternalClass {
              width: 100%; 
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%; 
            }
            .apple-link a {
              color: inherit !important;
              font-family: inherit !important;
              font-size: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
              text-decoration: none !important; 
            }
            #MessageViewBody a {
              color: inherit;
              text-decoration: none;
              font-size: inherit;
              font-family: inherit;
              font-weight: inherit;
              line-height: inherit;
            }
            .btn-primary table td:hover {
              background-color: #34495e !important;
              box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            }
            .btn-primary a:hover {
              background-color: #34495e !important;
              border-color: #34495e !important; 
            } 
          }

        </style>
      </head>
      <body>
        <span class="preheader">Scarlet Devil Mansion Doğrulama E-Postası</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
          <tr>
            <td>&nbsp;</td>
            <td class="container">
              <div class="content">

                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main">

                  <!-- START MAIN CONTENT AREA -->
                  <tr>
                    <td class="wrapper">
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td>
                            <p>Değerli kullanıcımız ' . $username . ',</p>
                            <p>Öncelikler merhaba!<br>Bu elektronik postayı sitemize üye olduğunuz için almış olmaktasın.</p>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                              <tbody>
                                <tr>
                                  <td align="left">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                      <tbody>
                                        <tr>
                                          <td> <a href="http://localhost/functions/verification/?username=' . $username . '&uvid=' . $uvid . '" target="_blank">Hesabını Doğrula</a> </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <p>Hesabını doğrulamanı rica ederiz. 36 saat içerisinde doğrulanmamış hesaplar hafıza kıtlığı nedeniyle silinmektedir.</p>
                            <p>Saygılarla,<br>Scarlet Devil Mansion Destek ekibi.</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->

                <!-- START FOOTER -->
                <div class="footer">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="content-block">
                        <span class="apple-link">Scarlet Devil Mansion Destek Ekibi</span>
                        <br> Elektronik posta almak istemiyor musun? <a style="cursor: not-allowed;">Öyle bir şansın yok.</a>.
                      </td>
                    </tr>
                    <tr>
                      <td class="content-block powered-by">
                        Takım üyesi ve bütçe yetersizliği nedeni yüzünden e-posta şablonu <a href="http://htmlemail.io" style="color: #ccc61f;">buradan</a> alınmıştır.
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- END FOOTER -->

              </div>
            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </body>
    </html>';

    $mail->AltBody = 'SDM Destek Ekibi';
    
    if($mail->send())
    {
      echo "Gönderim başarılı.";
    }
    /* else
    {
      echo "Gönderim başarısız.\n";
      echo 'Hata: ' . $mail->ErrorInfo;
    } */

#-----------------------------------------------------------------------------------------------------------------------------------------------------------