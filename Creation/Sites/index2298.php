<?php
// Set connection variables
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

// Create table for users if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    verified BOOLEAN DEFAULT FALSE,
    verification_code VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

function generateVerificationCode(){
    return bin2hex(random_bytes(16));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verification_code = generateVerificationCode();

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $verification_code);
    
    if ($stmt->execute()) {
        mail($email, "Verify Your Email", "Your verification code: $verification_code");

        echo "Signup successful. Please check your email to verify.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['verify'])) {
    $verification_code = $_GET['code'];

    $stmt = $conn->prepare("UPDATE users SET verified=1 WHERE verification_code=?");
    $stmt->bind_param("s", $verification_code);

    if ($stmt->execute()) {
        echo "Email verified successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Baby Products Website - Signup</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form method="POST" action="">
        Username:<br>
        <input type="text" name="username" required><br>
        Email:<br>
        <input type="email" name="email" required><br>
        Password:<br>
        <input type="password" name="password" required><br>
        <input type="submit" name="signup" value="Signup"><br>
    </form>
</body>
</html>
