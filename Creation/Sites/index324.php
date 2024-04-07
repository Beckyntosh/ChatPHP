<?php
// Assume a session start at the top of this script
session_start();

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

// Handle Deactivation Request
if(isset($_POST['deactivate'])){
    $userid = $_SESSION['user_id']; // Example user_id fetched from session
    $sql = "UPDATE users SET isActive = 0 WHERE id = $userid";
    
    if ($conn->query($sql) === TRUE) {
        echo "Account deactivated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Reactivation Request
if(isset($_POST['reactivate'])){
    $email = $_POST['email']; // Assuming email based reactivation
    $sql = "UPDATE users SET isActive = 1 WHERE email = '$email'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Account reactivated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Assuming HTML and PHP are in the same file for simplicity (Not Recommended)
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Deactivation/Reactivation</title>
</head>
<body>
    <div>
        <form method="post">
            <button name="deactivate">Deactivate My Account</button>
        </form>
    </div>
    <div>
        OR
    </div>
    <div>
        <form method="post">
            <input type="email" name="email" required placeholder="Your Email">
            <button name="reactivate">Reactivate My Account</button>
        </form>
    </div>
</body>
</html>