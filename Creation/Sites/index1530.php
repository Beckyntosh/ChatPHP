<?php
session_start();
$MYSQL_ROOT_PSWD = 'root';
$servername = 'db';
$database = 'my_database';
$username = 'root';
$password = $MYSQL_ROOT_PSWD;

// Connect to Database
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Users Table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

function Register($username, $password, $conn) {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ss", $username, $hashPassword);

    if (!$stmt->execute()) {
        return false;
    }

    $stmt->close();
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["g-recaptcha-response"])) {
    $recaptchaSecret = 'YOUR_SECRET_KEY';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptchaSecret . "&response=" . $_POST["g-recaptcha-response"]);
    $responseKeys = json_decode($response, true);
    
    if (intval($responseKeys["success"]) !== 1) {
        echo 'Please complete the CAPTCHA.';
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (Register($username, $password, $conn)) {
            echo "User successfully registered.";
        } else {
            echo "Error registering user.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h2>User Registration</h2>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
        <input type="submit" value="Register">
    </form>
</body>
</html>
