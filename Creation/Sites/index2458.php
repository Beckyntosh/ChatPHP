

<?php
// Sign-up using Google Account for a Pet Supplies website.
session_start();
require_once 'vendor/autoload.php';
//Replace 'your_google_client_id' and 'your_google_client_secret' with actual values from Google Developer Console
$google_client = new Google_Client();
$google_client->setClientId('your_google_client_id');
$google_client->setClientSecret('your_google_client_secret');
$google_client->setRedirectUri('http://your-website.com/callback.php');
$google_client->addScope('email');

// MySQL configuration 
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

// Creating database connection
$pdo = new PDO(
    'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE, 
    MYSQL_USER, 
    MYSQL_PASSWORD,
    $pdoOptions
);

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($sql);

if(isset($_GET["code"])){
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if(!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();

        if(!empty($data['given_name']) && !empty($data['family_name']) && !empty($data['email'])){
            $google_id = $data['id'];
            $email = $data['email'];
            $first_name = $data['given_name'];
            $last_name = $data['family_name'];

            // Checking if user already exists
            $stmt = $pdo->prepare("SELECT * FROM users WHERE google_id=:google_id");
            $stmt->execute(['google_id' => $google_id]);
            if($stmt->rowCount() == 0){
                // New user
                $stmt = $pdo->prepare("INSERT INTO users (google_id, email, first_name, last_name) VALUES (:google_id, :email, :first_name, :last_name)");
                $stmt->execute([
                    'google_id' => $google_id,
                    'email' => $email,
                    'first_name' => $first_name,
                    'last_name' => $last_name
                ]);
                $_SESSION['user_id'] = $pdo->lastInsertId();
            } else {
                // Existing user
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $user['id'];
            }

            // Redirect to dashboard or home page
            header('Location: dashboard.php');
            exit();
        }
    }
}
?>
<html>
<head>
    <title>Login with Google | Pet Supplies Website</title>
</head>
<body>
    <a href="<?php echo $google_client->createAuthUrl(); ?>">Login with Google</a>
</body>
</html>

Important considerations for the actual implementation:
- You will need to install the Google API Client Library for PHP (`composer require google/apiclient:"^2.0"`) and have Composer autoload configured.
- This example assumes the use of `.htaccess` or equivalent server configuration for clean URLs.
- You must replace placeholder values (such as `'your_google_client_id'` and `'your_google_client_secret'`) with actual values obtained from the Google Developer Console.
- Rigorous error handling, secure sessions management, and protection against CSRF and other web vulnerabilities have to be incorporated into a production-level application.
- This is a simplified example and doesn't account for all best practices with regard to scalability, security (like using HTTPS for OAuth callbacks), and code organization (such as the separation of database logic into repositories).
