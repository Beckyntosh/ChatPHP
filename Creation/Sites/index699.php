<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    echo 'Successfully registered.';
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: #F0E68C;
    font-family: 'Courier New', monospace;
}
form {
    background-color: #FFD700;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
}
</style>
</head>
<body>
<form action="" method="post">
    <div>
        <label for="username">Username: </label>
        <input type="text" id="username" name="username">
    </div>
    <div>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>
</body>
</html>