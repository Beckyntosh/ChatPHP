<?php
// Database configuration
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
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    isActive BOOLEAN DEFAULT true,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle account deactivation
if (isset($_POST['deactivate'])) {
    $email = $_POST['email'];
    $sql = "UPDATE users SET isActive=0 WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        echo "Account deactivated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle account reactivation
if (isset($_POST['reactivate'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "UPDATE users SET isActive=1 WHERE email='$email' AND password='$password'";
    if ($conn->query($sql) === TRUE) {
        echo "Account reactivated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitchenware Website: Account Management</title>
</head>
<body>
<h2>Deactivate Account</h2>
<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" name="deactivate" value="Deactivate Account">
</form>

<h2>Reactivate Account</h2>
<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" name="reactivate" value="Reactivate Account">
</form>
</body>
</html>
<?php
$conn->close();
?>