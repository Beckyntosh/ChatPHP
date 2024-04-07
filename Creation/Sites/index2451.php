<?php
// File: signup_with_google.php

session_start();

//DB Credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

//Google API Settings
require_once 'path/to/google/vendor/autoload.php';
$googleClient = new Google_Client();
$googleClient->setClientId('Your_Google_ClientID_Here');
$googleClient->setClientSecret('Your_Google_ClientSecret_Here');
$googleClient->setRedirectUri('Your_Redirect_URI');
$googleClient->addScope('email');
$googleClient->addScope('profile');

if (isset($_GET['code'])) {
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if (!isset($token['error'])) {
        $googleClient->setAccessToken($token['access_token']);
        
        $google_oauth = new Google_Service_Oauth2($googleClient);
        $google_account_info = $google_oauth->userinfo->get();
        
        $email = $google_account_info->email;
        $name = $google_account_info->name;
        
        // Database connection
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        //Check if user already exists
        $sql = "SELECT id FROM users WHERE email = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 0){
                    //User does not exist, insert new user
                    $insert_sql = "INSERT INTO users (name, email) VALUES (?, ?)";
                    
                    if($insert_stmt = mysqli_prepare($link, $insert_sql)){
                        mysqli_stmt_bind_param($insert_stmt, "ss", $param_name, $param_email);
                        
                        $param_name = $name;
                        $param_email = $email;
                        
                        if(mysqli_stmt_execute($insert_stmt)){
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else {
                            echo "Something went wrong. Please try again later.";
                        }
                        mysqli_stmt_close($insert_stmt);
                    }
                } else {
                    //User exists, log them in
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    header("location: welcome.php");
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            
            mysqli_stmt_close($stmt);
        }
        
        mysqli_close($link);
    }
} else {
    //Google login URL
    $login_url = $googleClient->createAuthUrl();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login With Google</title>
    </head>
    <body>
        <div class="container">
            <h2>Login with Google</h2>
            <form>
                <input type="button" onclick="window.location = '<?php echo $login_url; ?>';" value="Login With Google" class="google-btn">
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
