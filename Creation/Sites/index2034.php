<?php
// This sample code is for educational purposes and may require additional security and validation measures in a real-world scenario.

// Setting up connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Function to safely fetch POST data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Change password mechanism
$message = ''; // To store messages to the user

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = test_input($_POST["current_password"]);
    $new_password = test_input($_POST["new_password"]);
    $confirm_password = test_input($_POST["confirm_password"]);
    
    if(empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $message = "Please fill all fields.";
    } else {
        // Assuming user_id comes from a session of logged-in user
        $user_id = 1; // Example user ID. In real use, this should come from session

        // Verify the current password
        $sql = "SELECT password FROM users WHERE id = ?";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($hashed_password);
            if($stmt->fetch()) {
                if(password_verify($current_password, $hashed_password)){
                    // Current password is correct
                    if($new_password == $confirm_password){
                        // Update with new password
                        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                        $sql = "UPDATE users SET password = ? WHERE id = ?";
                        if($update_stmt = $conn->prepare($sql)){
                            $update_stmt->bind_param("si", $new_password_hash, $user_id);
                            if($update_stmt->execute()){
                                $message = "Password updated successfully.";
                            } else {
                                $message = "Error updating password.";
                            }
                            $update_stmt->close();
                        }
                    } else {
                        $message = "New passwords do not match.";
                    }
                } else {
                    $message = "Current password is incorrect.";
                }
            } else {
                $message = "User not found.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container{ width: 300px; padding: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Change Password</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Current Password</label>
            <input type="password" name="current_password" required>
        </div>    
        <div>
            <label>New Password</label>
            <input type="password" name="new_password" required>
        </div>
        <div>
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" required>
        </div>
        <div>
            <input type="submit" value="Change Password">
        </div>
    </form>
    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</div>

</body>
</html>
