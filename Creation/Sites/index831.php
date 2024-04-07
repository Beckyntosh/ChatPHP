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

// Create users table
$sql = "CREATE TABLE users (
    id INT PRIMARY AUTO_INCREMENT,
    username VARCHAR(30) UNIQUE NOT NULL,
    password VARCHAR(30),
    email VARCHAR(50),
    register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
)";
$conn->query($sql);

// Create products table
$sql = "CREATE TABLE products (
    id INT PRIMARY AUTO_INCREMENT,
    user_id INT,
    video_path VARCHAR(100),
    add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
$conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $conn->query($sql);
}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Magazines Video Sharing</title>
    <style>
        body {
            background-color: #FF9A8C;
            font-family: Arial, Helvetica, sans-serif;
        }
        form {
            background-color: #FFE5B2;
            width: 200px;
            padding: 30px;
            margin: 100px auto;
            border-radius: 10px;
        }
        input[type="submit"] {
            background-color: #98F898;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2>Register</h2>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        E-mail: <input type="email" name="email" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>