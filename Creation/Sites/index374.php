<?php
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    verification_code VARCHAR(50) NOT NULL,
    verified INT(1) NOT NULL DEFAULT '0',
    reg_date TIMESTAMP
    )";

if ($conn->query($tableSql) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

function generateVerificationCode() {
    return bin2hex(random_bytes(16));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $verificationCode = generateVerificationCode();

    $sql = "INSERT INTO users (email, verification_code) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $email, $verificationCode);

    if ($stmt->execute()) {
        // send email
        $to      = $email;
        $subject = 'Verify Your Email';
        $message = 'Please click on the following link to verify your email: http://yourwebsite.com/verify.php?code='.$verificationCode;
        $headers = 'From: noreply@yourwebsite.com' . "\r\n" .
            'Reply-To: noreply@yourwebsite.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        echo "Verification email sent.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
</head>
<body>
<h2>Sign Up</h2>
<form action="" method="post">
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" required><br>
  <input type="submit" value="Sign Up">
</form>
</body>
</html>