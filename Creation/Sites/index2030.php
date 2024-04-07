<?php
// Database connection
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
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    profile_picture VARCHAR(255),
    reg_date TIMESTAMP
)";

$auditTrailSql = "CREATE TABLE IF NOT EXISTS audit_trail (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    description VARCHAR(255),
    change_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($usersTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($auditTrailSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle profile picture update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];
    $newProfilePicture = $_POST['profile_picture'];

    // Update user's profile picture
    $sql = "UPDATE users SET profile_picture='$newProfilePicture' WHERE id=$userId";

    if ($conn->query($sql) === TRUE) {
        // Log the change in the audit trail
        $description = "Updated profile picture.";
        $auditSql = "INSERT INTO audit_trail (user_id, description) VALUES ($userId, '$description')";
        if ($conn->query($auditSql) !== TRUE) {
            echo "Error: " . $auditSql . "<br>" . $conn->error;
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>
<body>
    <h2>Edit Profile</h2>
    <form action="" method="post">
        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id" required><br>
        <label for="profile_picture">Profile Picture URL:</label><br>
        <input type="text" id="profile_picture" name="profile_picture" required><br><br>
        <input type="submit" value="Update Profile">
    </form>
</body>
</html>
