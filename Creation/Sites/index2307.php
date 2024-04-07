<?php
// Database connection parameters
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

// Create tables if not exist
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

$sqlLoyalty = "CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(6) DEFAULT 0,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sqlUsers) || !$conn->query($sqlLoyalty)) {
    echo "Error creating table: " . $conn->error;
}

// Handle registration and loyalty program signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // md5 for simplicity, use a better hash in real scenarios
    $loyalty_signup = isset($_POST['loyalty_signup']) ? 1 : 0;
    
    // Insert the user
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $last_user_id = $conn->insert_id;
        if ($loyalty_signup) {
            $loyaltySql = "INSERT INTO loyalty_program (user_id, points) VALUES ('$last_user_id', 0)";
            if (!$conn->query($loyaltySql)) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        echo "Registration successful!";
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
    <title>Sign up for Beauty Bonanza!</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: pink; color: purple; }
        form { width: 300px; padding: 20px; border-radius: 10px; background-color: lavender; margin: auto;}
        input, button { margin-top: 10px; }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Welcome to Beauty Bonanza!</h2>
        <input type="text" name="username" placeholder="Username" required/><br>
        <input type="email" name="email" placeholder="Email Address" required/><br>
        <input type="password" name="password" placeholder="Password" required/><br>
        <label>
            <input type="checkbox" name="loyalty_signup" value="1"/> Join our loyalty program
        </label><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
