<?php
session_start();
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Create connection to database
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create captcha table if not exists
$sql = "CREATE TABLE IF NOT EXISTS captcha_codes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    captcha_code VARCHAR(6) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

function createCaptcha() {
    $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
    $_SESSION["captcha"] = $code;
    $image = imagecreatefrompng("assets/images/captcha_bg.png");
    $textColor = imagecolorallocate($image, 0, 0, 0);
    imagestring($image, 5, 5, 5,  $code, $textColor);
    header("Content-type: image/png");
    imagepng($image);
    imagedestroy($image);
}

if (isset($_GET['captcha'])) {
    createCaptcha();
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $captcha = $conn->real_escape_string($_POST['captcha']);

    if ($captcha === $_SESSION["captcha"]) {
        // Insert user into database or your logic here
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Captcha verification failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Groceries Website Registration</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    <label for="captcha">Captcha:</label><br>
    <img src="?captcha=true" alt="CAPTCHA" style="border: 1px solid #000; margin-bottom: 10px;"><br>
    <input type="text" id="captcha" name="captcha" required><br>
    <input type="submit" name="register" value="Register">
</form>

</body>
</html>
<?php $conn->close(); ?>