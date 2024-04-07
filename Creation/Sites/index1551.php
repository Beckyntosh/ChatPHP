<?php
// Create a connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Check if the user has submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $userId = 1; // This should be dynamically fetched based on the logged-in user. Hardcoded to 1 for this example.
    
    // Create MySQL connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Fetch the current password of the user from the database
    $sql = "SELECT password FROM users WHERE id = ".$userId;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the current password
        if (password_verify($currentPassword, $row["password"])) {
            // Update with the new password in the database
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE users SET password = '".$newPasswordHash."' WHERE id = ".$userId;
            
            if ($conn->query($updateSql) === TRUE) {
                echo "Password updated successfully";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "Incorrect current password!";
        }
    } else {
        echo "User not found!";
    }
    
    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
</head>
<body>
    <h2>Change Your Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="currentPassword">Current Password:</label><br>
        <input type="password" id="currentPassword" name="currentPassword" required><br>
        <label for="newPassword">New Password:</label><br>
        <input type="password" id="newPassword" name="newPassword" required><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>
