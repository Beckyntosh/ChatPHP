<?php
// Simplified single-file approach, caution advised for production environments.

// Error reporting for development. REMOVE or MODIFY for production.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define MySQL connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt MySQL connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table with email verification columns if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255) NOT NULL,
    token VARCHAR(32) NOT NULL,
    verified TINYINT(1) NOT NULL DEFAULT 0,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(16)); // generate a token

    // Insert user into the database
    $sql = "INSERT INTO users (username, email, password, token) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $token);

    if($stmt->execute()) {
        // Send verification email
        $verifyLink = "http://".$_SERVER['HTTP_HOST']."/verify.php?token=$token";
        $subject = "Verify Your Email";
        $message = "Please click this link to verify your email: $verifyLink";
        $headers = "From: noreply@yourdomain.com";
        mail($email, $subject, $message, $headers);
        echo "Registration successful! Please check your email to verify.";
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
    <title>Signup - Bath Products</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Signup">
    </form>
</body>
</html>
