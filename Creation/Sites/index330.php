<?php
// Important: This example is oversimplified and lacks important aspects like input validation, error handling, and security measures like CSRF protection and secure storage of tokens.
// Ensure to implement such features in a real application.

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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50),
    facebook_id VARCHAR(255)
)";
if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS social_links (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    social_id VARCHAR(255),
    type VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Facebook login part (Pretend mechanism)
if (isset($_POST['facebook_login'])) {
    $userFacebookId = $_POST['facebook_id']; // Simulated Facebook ID from Facebook API response
    // Check in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE facebook_id = ?");
    $stmt->bind_param("s", $userFacebookId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Login
        $_SESSION['user'] = $result->fetch_assoc();
        echo "Logged in with Facebook successfully.";
    } else {
        echo "Facebook account not linked.";
    }
}

// Login form
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Login
        $_SESSION['user'] = $result->fetch_assoc();
        echo "Logged in successfully.";
    } else {
        echo "Invalid login credentials.";
    }
}

// Link Facebook account
if (isset($_POST['link_facebook'])) {
    $facebookId = $_POST['facebook_id']; // Simulated Facebook ID from Facebook API response

    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user']['id'];
        $stmt = $conn->prepare("UPDATE users SET facebook_id = ? WHERE id = ?");
        $stmt->bind_param("si", $facebookId, $userId);
        if ($stmt->execute()) {
            echo "Facebook account linked successfully.";
        } else {
            echo "Failed to link Facebook account.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login and Link with Facebook</title>
</head>
<body>
    <form method="POST" action="">
        <h2>Login</h2>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Login">
    </form>

    <form method="POST" action="">
        <h2>Link Facebook Account</h2>
        <input type="text" name="facebook_id" placeholder="Facebook ID" required><br>
        <input type="submit" name="link_facebook" value="Link Facebook">
    </form>

    <form method="POST" action="">
        <h2>Simulate Facebook Login</h2>
        <input type="text" name="facebook_id" placeholder="Facebook ID" required><br>
        <input type="submit" name="facebook_login" value="Login with Facebook">
    </form>
</body>
</html>