<?php
// Connection settings
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
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
profile_picture VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createAuditTable = "CREATE TABLE IF NOT EXISTS audit_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
action_type VARCHAR(50),
action_details VARCHAR(255),
action_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createUsersTable) || !$conn->query($createAuditTable)) {
    echo "Error creating tables: " . $conn->error;
}

// Functionality for handling the profile updates
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $newProfilePic = $_POST['profile_picture'];
  
    // Fetch the current profile picture for comparison
    $currentProfileQuery = "SELECT profile_picture FROM users WHERE id=$userId";
    $result = $conn->query($currentProfileQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentProfilePic = $row['profile_picture'];
        
        // Update if a change is detected
        if ($currentProfilePic != $newProfilePic) {
            $updateProfilePicQuery = "UPDATE users SET profile_picture='$newProfilePic' WHERE id=$userId";
            if ($conn->query($updateProfilePicQuery) === TRUE) {
                // Log the change to audit
                $logChangeQuery = "INSERT INTO audit_log (user_id, action_type, action_details) VALUES ('$userId', 'Profile Update', 'Profile picture updated')";
                if (!$conn->query($logChangeQuery)) {
                    echo "Error logging profile update: " . $conn->error;
                }
            } else {
                echo "Error updating profile picture: " . $conn->error;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile Editing</title>
</head>
<body>

<h2>Edit Profile Picture</h2>

<form method="post">
    <label for="userId">User ID:</label><br>
    <input type="number" id="userId" name="userId" required><br>
    <label for="profile_picture">New Profile Picture URL:</label><br>
    <input type="text" id="profile_picture" name="profile_picture" required><br><br>
    <input type="submit" value="Update Profile">
</form>

</body>
</html>

<?php
$conn->close();
?>