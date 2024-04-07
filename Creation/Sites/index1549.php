<?php
// Simple script to handle user profile edits with audit trail
// Connect to the database
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
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    profile_pic VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$auditTableSql = "CREATE TABLE IF NOT EXISTS audit_trail (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    action VARCHAR(50),
    description TEXT,
    performed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
    )";

$conn->query($userTableSql);
$conn->query($auditTableSql);

function logAudit($userId, $action, $description, $conn) {
  $stmt = $conn->prepare("INSERT INTO audit_trail (user_id, action, description) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $userId, $action, $description);
  $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $profilePic = basename($_FILES["profilePic"]["name"]);
    $targetDir = "uploads/";
    $targetFile = $targetDir . $profilePic;

    if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFile)) {
        $updateSql = "UPDATE users SET profile_pic = '$profilePic' WHERE id = $userId";
        if ($conn->query($updateSql) === TRUE) {
            logAudit($userId, 'Profile Update', 'User has updated their profile picture.', $conn);
            echo "Profile picture updated successfully.";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile Edit</title>
</head>
<body>
<h2>Edit Profile</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="profilePic" id="profilePic">
Hardcoded user ID for simplicity
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
<?php $conn->close(); ?>
