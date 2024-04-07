<?php
// Database Configuration
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

// Access Account Functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        echo "<div style='color: green;'>Welcome " . $user['name'] . "!</div>";
    } else {
        echo "<div style='color: red;'>Invalid credentials</div>";
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
<title>Books Local Business Directory - Access Account</title>
<style>
    body {
        font-family: "Comic Sans MS", cursive, sans-serif;
        background-color: #FFC0CB; /* Light pink */
        color: #000;
    }
    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #FFF3F4; /* Lighter pink */
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
        color: #FF1493; /* Deep pink */
        text-align: center;
    }
    .login-form {
        display: flex;
        flex-direction: column;
    }
    .login-form input {
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #FF69B4; /* Hot pink */
        border-radius: 5px;
    }
    .login-form button {
        padding: 10px;
        background-color: #FF69B4; /* Hot pink */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .login-form button:hover {
        background-color: #FF1493; /* Deep pink */
    }
</style>
</head>
<body>
<div class="container">
    <h1>Access Your Account</h1>
    <form class="login-form" method="POST">
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="password" name="password" placeholder="Your Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>
</body>
</html>