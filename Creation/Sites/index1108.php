<?php
session_start();
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create captcha table if not exists
$captchaTableSql = "CREATE TABLE IF NOT EXISTS captcha_codes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    captcha_code VARCHAR(6) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($captchaTableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

function generateCaptchaCode() {
    // generated 6 digits captcha code
    $permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    return substr(str_shuffle($permitted_chars), 0, 6);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userCaptcha = $_POST['captcha'];
    
    if ($userCaptcha == $_SESSION['captcha_text']) {
        // Proceed with the registration process
        echo "<p>CAPTCHA verification successful!</p>";
    } else {
        echo "<p>Invalid CAPTCHA. Please try again.</p>";
    }
} else {
    // New captcha
    $captcha_text = generateCaptchaCode();
    $_SESSION['captcha_text'] = $captcha_text;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form with CAPTCHA</title>
</head>
<body>

<h2>Health and Wellness Product Registration</h2>
<form action="" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="captcha">Captcha: <?php echo $_SESSION['captcha_text']; ?></label><br>
    <input type="text" id="captcha" name="captcha" required><br><br>
    <input type="submit" value="Register">
</form>

</body>
</html>

<?php
$conn->close();
?>
