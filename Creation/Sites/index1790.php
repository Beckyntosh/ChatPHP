<?php
// Database Configuration
define("MYSQL_ROOT_PSWD", 'root');
define("MYSQL_DB", 'my_database');
define("SERVERNAME", 'db');
define("USERNAME", 'root');

// Creating a connection
$conn = new mysqli(SERVERNAME, USERNAME, MYSQL_ROOT_PSWD, MYSQL_DB);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the account_action parameter is posted either for activation or deactivation
if (isset($_POST['account_action'])) {
    $email = $_POST['email']; // User Email
    $action = $_POST['account_action']; // Account Action - Either 'deactivate' or 'reactivate'

    // Deactivate or Reactivate Account
    if ($action == 'deactivate') {
        $query = "UPDATE users SET active = 0 WHERE email = ?";
    } elseif ($action == 'reactivate') {
        $query = "UPDATE users SET active = 1 WHERE email = ?";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo $action == 'deactivate' ? "Account has been deactivated." : "Account has been reactivated.";
    } else {
        echo "An error occurred. Please try again.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation and Deactivation</title>
</head>
<body>
    <h2>Manage Your Account</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="radio" id="deactivate" name="account_action" value="deactivate">
        <label for="deactivate">Deactivate Account</label><br>
        <input type="radio" id="reactivate" name="account_action" value="reactivate">
        <label for="reactivate">Reactivate Account</label><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

