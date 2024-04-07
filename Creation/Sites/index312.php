<?php
// Assuming you are using session to manage logged in users
session_start();

// Database connection details
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to verify and change password
function changePassword($conn, $userID, $currentPassword, $newPassword) {
    // Fetch the current password from database
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        // Verify current password
        if (password_verify($currentPassword, $hashedPassword)) {
            // Change to the new password
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $updateStmt->bind_param("si", $newHashedPassword, $userID);
            if ($updateStmt->execute()) {
                return true;
            }
        }
    }
    return false;
}

$message = "";
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["userID"])) {
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    if (changePassword($conn, $_SESSION["userID"], $currentPassword, $newPassword)) {
        $message = "Password changed successfully.";
    } else {
        $message = "Current password is incorrect.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Change Password</h2>
    <?php echo !empty($message) ? '<p>'.$message.'</p>' : ''; ?>
    <form method="POST">
        <label for="currentPassword">Current Password:</label><br>
        <input type="password" id="currentPassword" name="currentPassword" required><br>
        <label for="newPassword">New Password:</label><br>
        <input type="password" id="newPassword" name="newPassword" required><br>
        <button type="submit">Change Password</button>
    </form>
</body>
</html>