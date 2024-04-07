<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) UNIQUE,
    password VARCHAR(255)
    )";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT IGNORE INTO admin (username, password) VALUES ('admin', 'admin_password')";
if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if (!isset($row)) {
        echo 'User does not exist';
    } elseif ($row['password'] == $password) {
        echo 'You are logged in!';
    } else {
        echo 'Wrong password!';
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Heritage Haven:Admin Login</title>
    <style>
        body { font-family: Times New Roman; color: navy; background-color: white; }
        .container { width: 400px; padding: 16px; background-color: lightgrey; margin: 0 auto; margin-top: 100px; border: 1px solid black; border-radius: 6px; }
        input[type=text], input[type=password] { width: 100%; padding: 15px; margin: 5px 0 10px 0; display: inline-block; border: none; background: white; }
        input[type=password]:focus, input[type=text]:focus { background-color: lightblue; outline: none; }
        .submit { background-color: navy; color: white; padding: 15px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        .submit:hover { opacity: 0.8; }
    </style>
</head>
<body>
    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" class="submit">Admin Login</button>
</body>
</html>