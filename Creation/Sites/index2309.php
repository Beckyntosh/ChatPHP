<?php
// Connection variables
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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
joined_loyalty_program BOOLEAN DEFAULT 0,
reg_date TIMESTAMP
)";

$conn->query($sql);

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $loyalty_program = isset($_POST['loyalty_program']) ? 1 : 0;

    $stmt = $conn->prepare("INSERT INTO users (username, password, email, joined_loyalty_program) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $password, $email, $loyalty_program);
    
    if ($stmt->execute()) {
        echo "Registered successfully!";
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
    <title>Sign Up</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {max-width: 400px; margin: 0 auto; padding: 20px;}
        label, input {display: block; width: 100%; padding: 8px;}
        input[type=checkbox] {display: inline; width: auto;}
        button {padding: 10px 20px; background-color: #008cba; color: white; border: none; cursor: pointer;}
        button:hover {background-color: #005f73;}
    </style>
</head>
<body>
<div class="container">
    <h2>Sign Up</h2>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        
        <input type="checkbox" id="loyalty_program" name="loyalty_program" value="1">
        <label for="loyalty_program">Join our loyalty program</label>
        
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
