<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($userTable) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]); // Simple MD5 hash for demonstration purposes
    
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    
    if($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Premium File Storage</title>
    <style>
        body { font-family: 'Monaco', monospace; }
        .container { width: 500px; margin: auto; }
        input[type=text], input[type=password], input[type=email] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Access to Premium File Storage Features</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="psw">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Sign Up</button>
    </form>
</div>

</body>
</html>
