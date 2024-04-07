<?php
* Simple User Signup Script for a School Supplies Website */

* MYSQL Connection Variables */
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

* Connect to MySQL */
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

* Check connection */
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

* Handle User Signup */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    
    // Basic Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($name)) {
        $error = "Invalid input data.";
    } else {
        // Insert into the database
        $stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        
        if ($stmt->execute()) {
            $success = "User registered successfully!";
        } else {
            $error = "Something went wrong: " . $stmt->error;
        }
    }
}

* Create tables if not exists */
$createTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL
)";
$mysqli->query($createTableSql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup | School Supplies Website</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <h2>User Signup</h2>
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Signup</button>
            </div>
        </form>
    </div>
</body>
</html>
