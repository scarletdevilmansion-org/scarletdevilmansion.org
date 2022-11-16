<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '<script>history.back()</script>';
    if( !empty($_POST["checkbox"]) ) {
        setcookie ("username", $username, time()+ (10 * 365 * 24 * 60 * 60));  
        setcookie ("password",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
    } else {
        echo '<script>alert("Çerezler ayarlandı. TaTları eminim ki çok güzeldir")</script>';
    setcookie ("username",""); 
    setcookie ("password","");
    }
    exit;
}
 
// Include config file
require_once "../../connections/connection.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Bu lazım hani giriş işleri için. Anlarsın ya?..";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Şifrenizi girmeyi düşünür müsünüz?";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;           
                            
                            // Redirect user to welcome page
                            echo '<script>history.back(-1)</script>';
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Geçersiz parola. Umarım hesap çalmaya çalışmıyorsundur...";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Geçersiz kullanıcı adı.";
                }
            } else{
                echo "HoppBALA! Daha sonra gel tekrar dene, burada her şey çorbaya döndü.";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="../../../assets/css/login.css">
    <link rel="stylesheet" href="../../assets/css/loading.css">
    <script src="../../assets/js/loading.js"></script>
</head>
    <body>
        <center>
            <div class="section">
                <div class="wrapper-2">
                    <h2>Giriş Yapınız</h2>
                    <p>Giriş yapmak için boş yerleri doldur.</p>
                    <?php 
                        if(!empty($login_err)){
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }        
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                            placeholder="O eşsiz kullanıcı adını yaz." value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Parola</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                            placeholder="Sır gibi sakladığın şifren buraya.">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value= { unchecked } id="checkbox" name="checkbox">
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
                    <h2>Test</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo<br>
                    unde expedita distinctio dolores saepe corrupti deleniti<br>
                    excepturi aperiam deserunt, fugit quo? Pariatur voluptatum quaerat<br>
                    alias necessitatibus optio, modi reprehenderit nesciunt!</p>
                </div>
            </div>
        </center>
    </body>
</html>