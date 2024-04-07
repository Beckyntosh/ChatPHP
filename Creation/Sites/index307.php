<?php
// Handle PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB credentials
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root'); // Default root username

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, MYSQL_ROOT_PSWD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$createProfileTable = "CREATE TABLE IF NOT EXISTS user_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    profile_pic VARCHAR(255) NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createAuditTable = "CREATE TABLE IF NOT EXISTS audit_trail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    action_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user_profiles(id)
)";

if (!$conn->query($createProfileTable) || !$conn->query($createAuditTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $profilePic = $_POST['profile_pic']; // This should be replaced with actual image upload logic
    $userId = $_POST['user_id'];

    // Update user profile
    $updateProfile = $conn->prepare("UPDATE user_profiles SET username=?, profile_pic=? WHERE id=?");
    $updateProfile->bind_param("ssi", $username, $profilePic, $userId);

    if ($updateProfile->execute()) {
        // Log to audit trail
        $action = "Profile Update";
        $description = "User updated their profile.";
        $logAudit = $conn->prepare("INSERT INTO audit_trail (user_id, action, description) VALUES (?, ?, ?)");
        $logAudit->bind_param("iss", $userId, $action, $description);
        $logAudit->execute();

        echo "<script>alert('Profile updated successfully!'); window.location.href=window.location.href;</script>";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Edit</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #ccc; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input, button { padding: 10px; }
        button { background-color: #007bff; color: white; border: none; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Profile</h2>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="profile_pic">Profile Picture URL:</label>
        <input type="text" id="profile_pic" name="profile_pic" required>

Assume a static user ID for simplicity
        
        <button type="submit">Update Profile</button>
    </form>
</div>

</body>
</html>