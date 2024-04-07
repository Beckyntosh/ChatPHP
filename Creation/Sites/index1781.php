<?php

*
 * IMPORTANT NOTICE:
 * The following code is for educational and research purposes only.
 * It may not follow best security practices.
 * Ensure you have proper security measures (like validation, CSRF protection, etc.) in place when using in a production environment.
 */

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

// Create audit table if not exists
$auditTableSql = "CREATE TABLE IF NOT EXISTS user_profile_audit (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    changed_fields TEXT NOT NULL,
    change_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
$conn->query($auditTableSql);

// Function to log changes
function logChanges($userId, $changedFields, $conn) {
    $changedFieldsJson = json_encode($changedFields);
    $stmt = $conn->prepare("INSERT INTO user_profile_audit (user_id, changed_fields) VALUES (?, ?)");
    $stmt->bind_param("is", $userId, $changedFieldsJson);
    $stmt->execute();
}

// Assuming a form is submitted with a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $newProfilePic = $_POST['profilePic']; // Assuming file name for simplicity
    
    // Fetch current profile picture to compare changes
    $userFetchSql = "SELECT profile_picture FROM users WHERE id = $userId";
    $result = $conn->query($userFetchSql);
    $row = $result->fetch_assoc();
    $currentProfilePic = $row['profile_picture'];
    
    // Check if profile picture has changed
    if ($currentProfilePic != $newProfilePic) {
        // Update the user's profile picture
        $updateSql = "UPDATE users SET profile_picture = '$newProfilePic' WHERE id = $userId";
        if ($conn->query($updateSql) === TRUE) {
            // Log this change
            logChanges($userId, ['profile_picture' => $newProfilePic], $conn);
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>

<h2>User Profile Edit</h2>

<form method="post" enctype="multipart/form-data">
Static user ID for demonstration
    Profile Picture: <input type="file" name="profilePic">
    <input type="submit" value="Update Profile">
</form>

</body>
</html>

Please note, in a production environment, you would want to add security measures such as input validation, protection against SQL Injection, CSRF protection, proper error handling, and file upload security for the profile picture. This code is a simplified example, not meant for a production environment without further development and security hardening.