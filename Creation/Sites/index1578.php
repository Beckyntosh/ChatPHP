<?php
// Handle database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    status ENUM('active', 'deactivated') DEFAULT 'active',
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Handle account deactivation
if (isset($_POST['deactivate'])) {
    $email = $_POST['email'];
    $updateQuery = "UPDATE users SET status='deactivated' WHERE email='$email'";
    if ($conn->query($updateQuery) === TRUE) {
        echo "Account has been deactivated successfully.";
    } else {
        echo "Error deactivating account: " . $conn->error;
    }
}

// Handle account reactivation
if (isset($_POST['reactivate'])) {
    $email = $_POST['email'];
    $updateQuery = "UPDATE users SET status='active' WHERE email='$email'";
    if ($conn->query($updateQuery) === TRUE) {
        echo "Account has been reactivated successfully.";
    } else {
        echo "Error reactivating account: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Management</title>
</head>
<body>
    <h2>Deactivate Account</h2>
    <form method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <input type="submit" name="deactivate" value="Deactivate Account">
    </form>

    <h2>Reactivate Account</h2>
    <form method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <input type="submit" name="reactivate" value="Reactivate Account">
    </form>
</body>
</html>

Note: This sample script assumes you have already setup your environment and user permissions properly for MySQL, and it's intended to provide a basic example. Ensure you implement proper security measures (like prepared statements) and validation before using this in a production environment.