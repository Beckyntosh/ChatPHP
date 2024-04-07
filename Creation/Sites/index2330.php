<?php
// Define connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'my_database');

// Connect to MYSQL database
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create table if not exists
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($connection->query($createUsersTable) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}

$createEventsTable = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(50) NOT NULL,
    eventDate DATE NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    createdBy INT(6) UNSIGNED,
    FOREIGN KEY (createdBy) REFERENCES users(id)
    )";

if ($connection->query($createEventsTable) === TRUE) {
    echo "Table events created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}

// Handling user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $connection->real_escape_string($_POST['username']);
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);

    $insertUserSQL = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    
    if ($connection->query($insertUserSQL) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $insertUserSQL . "<br>" . $connection->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration Platform</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>

<?php
$connection->close();
?>
