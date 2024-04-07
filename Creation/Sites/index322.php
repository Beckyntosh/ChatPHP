<?php
// Set up connection variables
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

// Handle account deactivation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deactivate'])) {
    $user_id = $_POST['user_id'];
    $sql = "UPDATE users SET active=0 WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Account deactivated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle account reactivation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reactivate'])) {
    $user_id = $_POST['user_id'];
    $sql = "UPDATE users SET active=1 WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Account reactivated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Account Deactivation and Reactivation</title>
</head>
<body style="background-color: #f0e4d7; font-family: Arial, sans-serif;">
<div style="margin: auto; width: 50%; border: 3px solid green; padding: 10px;">
    <h2 style="text-align: center;">Deactivate or Reactivate Your Account</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required><br><br>
        <input type="submit" name="deactivate" value="Deactivate Account" style="background-color: #f44336; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;">
        <input type="submit" name="reactivate" value="Reactivate Account" style="background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer;">
    </form> 
</div>
</body>
</html>
<?php
$conn->close();
?>
