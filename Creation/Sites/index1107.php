<?php
session_start();
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Connect to database
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

function generateCaptcha(){
    $code=rand(1000,9999);
    $_SESSION["captcha"]=$code;
    header("Content-Type: image/png");
    $im = imagecreatetruecolor(50, 24);
    $bg = imagecolorallocate($im, 22, 86, 165); 
    $fg = imagecolorallocate($im, 255, 255, 255); 
    imagefill($im, 0, 0, $bg);
    imagestring($im, 5, 5, 5,  $code, $fg);
    imagepng($im);
    imagedestroy($im);
}

if (isset($_GET['captcha'])) {
    generateCaptcha();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check captcha
    if ($_POST["captcha"] != $_SESSION["captcha"]) {
        echo "<p>Invalid CAPTCHA</p>";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Registration successful</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>CAPTCHA Example</title>
</head>
<body>
<form action="" method="post">
    <p>Username: <input type="text" name="username"></p>
    <p>Email: <input type="email" name="email"></p>
    <p>CAPTCHA: <img src="?captcha=1"></p>
    <p>Enter CAPTCHA: <input type="text" name="captcha"></p>
    <input type="submit" value="Register">
</form>
</body>
</html>
