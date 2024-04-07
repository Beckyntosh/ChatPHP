<?php
// Connection variables
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

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255) NOT NULL,
isActive BOOLEAN NOT NULL DEFAULT TRUE,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle deactivation and reactivation requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $email = $_POST['email'];

        switch ($_POST['action']) {
            case 'deactivate':
                $updateSQL = "UPDATE users SET isActive=FALSE WHERE email='$email'";
                break;
            case 'reactivate':
                $updateSQL = "UPDATE users SET isActive=TRUE WHERE email='$email'";
                break;
            default:
                $updateSQL = '';
        }

        if (!empty($updateSQL) && $conn->query($updateSQL) === TRUE) {
            echo "Account successfully updated.";
        } else {
            echo "Error updating account: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Furniture Site Account Management</title>
</head>
<body>
<h2>Account Deactivation/Reactivation Form</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <input type="radio" id="deactivate" name="action" value="deactivate">
    <label for="deactivate">Deactivate</label><br>
    <input type="radio" id="reactivate" name="action" value="reactivate">
    <label for="reactivate">Reactivate</label><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
