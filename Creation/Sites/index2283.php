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
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    verified TINYINT(1) DEFAULT 0,
    token VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16)); // generates a token

    // Insert user into the database
    $sql = "INSERT INTO users (username, email, token) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $token);
    
    if ($stmt->execute()) {
        // Send verification email
        $to = $email;
        $subject = 'Verify Your Email';
        $message = 'Click on this link to verify your email: https://yourdomain.com/verify.php?token=' . $token;
        $headers = 'From: noreply@yourdomain.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        echo "Registration successful! Check your email to verify.";
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
    <title>Signup | Camera World</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post" action="signup.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
