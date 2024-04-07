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

// Create tables if they do not exist
$users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($users_table) === FALSE) {
  echo "Error creating users table: " . $conn->error;
}

// Handle Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute()) {
        echo "<p>Registration successful! You can now access exclusive content.</p>";
    } else {
        echo "<p>Registration failed: " . htmlspecialchars($stmt->error) . "</p>";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Signup for Exclusive Content</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: floralwhite;
        color: darkred;
    }
    .container {
        width: 300px;
        padding: 16px;
        background-color: white;
        margin: 0 auto;
        border-radius: 8px;
        border: 1px solid darkred;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    button {
        background-color: darkred;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
</style>
</head>
<body>

<div class="container">
  <h2>Signup for Access to Exclusive Member-Only Content</h2>
  <p>Please fill in this form to create an account.</p>
  <form action="" method="post">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button type="submit" name="register">Sign Up</button>
  </form>
</div>

</body>
</html>
